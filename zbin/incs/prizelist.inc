<?php

/*
 *
 * build sidebar list of chores showing name and price
 *
 *
 *
 */

function orderPrize($prizeID,$userID){
       $dbh = connect();
       $date = Date("Y-m-d");
       $sql = "INSERT into `orders` (`prizeID`,`userID`,`dateCreated`,`stateID`) VALUES ('$prizeID','$userID','$date','5')";
       $result = mysql_query($sql,$dbh) or die("<span class='error'>could not execute query</span>");
       // - check return
       if(mysql_affected_rows() != 0){
       	  // wish cleanup, if ordered no need for wish
  	      if(isWish($prizeID,$userID)){
  	      	  removeWish($prizeID,$userID);
  	       }
  	     return true;
        }else{
         return false;
        }
        
}



function isOrdered($prizeID,$userID){
	print "PRIZE:".$prizeID."  USER:".$userID."<br>";
  $dbh = connect();
  $sql= "SELECT orders.prizeID FROM orders WHERE orders.userID = '$userID' AND orders.prizeID = '$prizeID'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute wish query</span>");
  $num = mysql_numrows($result);
  if($num > 0){
    return true;	
  }else{
  	return false;	
  } 
}	



// return html table of prizes user has orderd
function orderedPrizes($userID){
	
  $dbh = connect();
  $sql= "SELECT prize.id, prize.name, prize.image, prize.dateCreated, prize.moneyValue FROM prize LEFT JOIN orders on prize.id = orders.prizeID WHERE orders.userID = '$userID'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute query</span>");
  $num = mysql_numrows($result);
  $cost = 0;
  print "NUMBER OF ROWS:$num<br />";
  $out = '<table border="0" class="table-prize-ordered" cellpadding="0" cellspacing="0">';
   while ($row = mysql_fetch_array($result))
    {
     $prizeid = $row['id'];
     $prizename = $row['name'];
     $prizeimage = $row['image'];
     $orderdate = $row['dateCreated'];
    // $state = $row['statename'];
     $prizecost = $row['moneyValue'];
     $out .= '<tr><td>'.$orderdate.'</td><td>'.$prizecost.'</td><td>' . $prizename . '</td><td><a href="'.$prizeurl.'" target="_blank"><img border="0" src="' . $prizeimage .'" height="50"></a></td></tr>';
     $out .= '<tr><td colspan="4" class="table-prize-divider"><img border="0" src="/imgs/spacer.gif" width="1" height="0" /></td></tr>';
     $cost = ($cost + $prizecost);  
    }
    $out .= '<tr><td colspan="4" align="right"><b>Total value: $'.$cost.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>';
   $out .= '</table>';
   return $out;
}	



function Prizes($userID){
 $out= getPrizes($userID);
# $out .= "<br /><br />";
# $out .= getPrizesDesc();
 return $out;
	
}	
	
// display quick chore information 
function getPrizes($userID) {  
  
  $dbh = connect();
  $sql = "SELECT prize.id, prize.name, prize.moneyValue, prize.image, prize.url FROM prize ORDER by prize.id";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  $balance = getBalance($userID);
  
 
  
  // - check return
  if($num != 0){
  //echo "<b> chores found!</b><br /><br />";

   $out = '<table border="0" class="table-prize">';
      
   while ($row = mysql_fetch_array($result))
    {
     $prizeid = $row['id'];
     $prizename = $row['name'];
     $prizevalue  = $row['moneyValue'];
     $prizeimage = $row['image'];
     $prizeurl = $row['url'];
      $totalChorePoints = dollarsToChorePoints($userID,$prizevalue);
      $chorePointsLeftToGO = getChorePointsLeft($userID,$prizevalue);
     
     
        $out .= '<tr><td colspan="2"><a href="'.$prizeurl.'" target="_blank"><img border="0" src="' . $prizeimage .'" height="100"></a></td></tr>';
        $out .= '<tr><td colspan="2">' . $prizename . '</td></tr>';
        $out .= '<tr><td class="money">$' . $prizevalue . '</td><td><b>' . $totalChorePoints . '</b> <i>Chore Points</i></td></tr>';
   
   if($balance >= $totalChorePoints){
        $out .= '<tr><td  colspan="2" align="left"><form action="/zbin/shoppingCart.php" method="post"><input type="hidden" name="prizeID" value="'. $prizeid . '" /><input type="submit" value="Add to cart" /></form></td></tr>';
   }else{
        $out .= '<tr><td  colspan="2" align="left">You still need <span class="chores-left-togo">' . $chorePointsLeftToGO .  '</span></td></tr>';
   }
   
           $out .= '<tr><td colspan="2" class="table-prize-divider"><img border="0" src="/imgs/spacer.gif" width="1" height="0" /></td></tr>';
        
        
        #$out .= '<tr><td>' . $prizename . '</td><td>' . $prizevalue . '</td><td><image src="' . $prizeimage .'" height="100"></tr>';
        
     } 
     $out .= "</table>";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 

// show all prizes with checkboxes for user selection
function getPrizesForSelection($userID) {  
  
  $dbh = connect();
  $sql = "SELECT prize.id, prize.name, prize.moneyValue, prize.image, prize.url FROM prize";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  $balance = getBalance($userID);
  
 
  
  // - check return
  if($num != 0){
  //echo "<b> chores found!</b><br /><br />";

   $out = '<form action="prize_user_selection.php" method="post">'.$br.'<table border="0" class="table-prize">'.$br;
   $i = 0; 
   $br = "\n";
   while ($row = mysql_fetch_array($result))
    {
     $prizeid = $row['id'];
     $prizename = $row['name'];
     $prizevalue  = $row['moneyValue'];
     $prizeimage = $row['image'];
     $prizeurl = $row['url'];
      $totalChorePoints = dollarsToChorePoints($userID,$prizevalue);
      $chorePointsLeftToGO = getChorePointsLeft($userID,$prizevalue);
     
     if(!isWish($prizeid,$userID)){
        $out .= '<tr><td colspan="2"><a href="'.$prizeurl.'" target="_blank"><img border="0" src="' . $prizeimage .'" height="100"></a></td></tr>'.$br;
        $out .= '<tr><td colspan="2">' . $prizename . '</td></tr>'.$br;
        $out .= '<tr><td class="money">$' . $prizevalue . '</td><td><b>' . $totalChorePoints . '</b> <i>Chore Points</i></td></tr>'.$br;
        $out .= '<tr><td colspan="3"><input type="checkbox" name="wish[]" value=' . $prizeid . '</td></tr>'.$br;
        $out .= '<tr><td colspan="2" class="table-prize-divider"><img border="0" src="/imgs/spacer.gif" width="1" height="0" /></td></tr>'.$br;
     }     
     $i++;   
     } 
     $out .= '<tr><td clospan="3"><input type="submit" value="Add to wish list" /></table></form>'.$br;
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 

// show all prizes with checkboxes for user selection
function getPrizesForEdit($userID,$admin) {  
  
  $dbh = connect();
  print "ADMIN:$admin<br />";
   if($admin){
   $sql = "SELECT prize.id, prize.name, prize.moneyValue, prize.image, prize.url FROM prize";
   }else{
$sql = "SELECT prize.id, prize.name, prize.moneyValue, prize.image, prize.url FROM prize WHERE prize.authorID = $userID";
   }	
   
  
  
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  $balance = getBalance($userID);
  
 
  
  // - check return
  if($num != 0){
  //echo "<b> chores found!</b><br /><br />";

   $out = '<form action="prize_edit.php" method="post">'.$br.'<table border="0" class="table-prize">'.$br;
   $i = 0; 
   $br = "\n";
   while ($row = mysql_fetch_array($result))
    {
     $prizeid = $row['id'];
     $prizename = $row['name'];
     $prizevalue  = $row['moneyValue'];
     $prizeimage = $row['image'];
     $prizeurl = $row['url'];
      $totalChorePoints = dollarsToChorePoints($userID,$prizevalue);
      $chorePointsLeftToGO = getChorePointsLeft($userID,$prizevalue);
     
        $out .= '<tr><td><input type="radio" name="id" value=' . $prizeid . '</td>';
        $out .= '<td><a href="'.$prizeurl.'" target="_blank"><img border="0" src="' . $prizeimage .'" height="40"></a></td>';
        $out .= '<td>' . $prizename . '</td><td class="money">$' . $prizevalue . '</td><td><b>' . $totalChorePoints . '</b> <i>Chore Points</i></td></tr>'."\n";
      
   
          
     $i++;   
     } 
     $out .= '<tr><td colspan="5" align="right"><input type="submit" value="Edit" /></td></tr></table></form>'."\n";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 
function saveUserPrizeRel($userID,$prizeID){
   $dbh = connect();
   $date = Date("Y-m-d");
   $sql = "INSERT INTO `user_prize_rel` (`id`, `userID`, `prizeID`, `stateID`) VALUES ('', '$userID','$prizeID',1)"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
}	


function viewPrizeWishList($userID){
  $dbh = connect();
  $sql= "SELECT user_prize_rel.prizeID, user_prize_rel.stateID, prize.id, prize.name, prize.description, prize.moneyValue, prize.image, prize.url FROM user_prize_rel, prize WHERE user_prize_rel.userID = '$userID' AND prize.id = user_prize_rel.prizeID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute query</span>");
  $num = mysql_numrows($result);
  $cost = 0;
  
   print "NUMBER OF ROWS:$num<br />";
   $balance = getBalance($userID);
  $out = '<table border="0" class="table-prize-ordered" cellpadding="0" cellspacing="0">';
   while ($row = mysql_fetch_array($result))
    {
     $prizeid = $row['id'];
     $prizename = $row['name'];
     $prizeimage = $row['image'];
     $prizecost = $row['moneyValue'];
     $prizedesc = $row['description'];
       $prizevalue  = $row['moneyValue'];
     
      $totalChorePoints = dollarsToChorePoints($userID,$prizevalue);
      $chorePointsLeftToGO = getChorePointsLeft($userID,$prizevalue);
     
     
   
     $out .= '<tr><td><a href="'.$prizeurl.'" target="_blank"><img border="0" src="' . $prizeimage .'" height="50"></a></td><td>' . $prizename . '</td></tr>';
     $out .= '<tr><td colspan="4" class="table-prize-divider"><img border="0" src="/imgs/spacer.gif" width="1" height="0" /></td></tr>';
     
         if($balance >= $totalChorePoints){
        $out .= '<tr><td align="right"><form action="/zbin/prize_wish_remove.php" method="post"><input type="hidden" name="prizeID" value="'. $prizeid . '" /><input type="submit" value="remove" /></form></td><td  colspan="3" align="right"><form action="/zbin/shoppingCart.php" method="post"><input type="hidden" name="prizeID" value="'. $prizeid . '" /><input type="submit" value="Add to cart" /></form></td></tr>';
   }else{
        $out .= '<tr><td><form action="/zbin/prize_wish_remove.php" method="post"><input type="hidden" name="prizeID" value="'. $prizeid . '" /><input type="submit" value="remove" /></form></td><td colspan="3" align="right">You still need <span class="chores-left-togo">' . $chorePointsLeftToGO .  '</span></td></tr>';
   }
     
     
     
     $cost = ($cost + $prizecost);  
    }
    $out .= '<tr><td colspan="4" align="right"><b>Total value: $'.$cost.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>';
   $out .= '<tr><td colspan="4"><a href="sendWishList.php">Email this list</table>';
   return $out;
}	   


function isWish($prizeID,$userID){
	print "PRIZE:".$prizeID."  USER:".$userID."<br>";
  $dbh = connect();
  $sql= "SELECT user_prize_rel.prizeID FROM user_prize_rel WHERE user_prize_rel.userID = '$userID' AND user_prize_rel.prizeID = '$prizeID'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute wish query</span>");
  $num = mysql_numrows($result);
  if($num > 0){
    return true;	
  }else{
  	return false;	
  } 
}	



function removeWish($prizeID,$userID){
   print "P:$prizeID - U:$userID<br />";
   $dbh = connect();
   $sql = "DELETE FROM user_prize_rel WHERE userID = '$userID' && prizeID = '$prizeID'"; 
   $result = @mysql_query($sql,$dbh) or die("could not remove wish");
}	
	
// display extended chore information
function getPrizesDesc() {  
   
} 

?>