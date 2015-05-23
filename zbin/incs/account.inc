<?php

/*
 *
 * build sidebar list of chores showing name and price
 *
 *
 *
 */


// display balance and dollar amount
function findUsersInGroup($adminID) {  
  $dbh = connect();
  $sql = "SELECT account.exchangeRate, account.balance FROM account WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute query</span>");
  $num = mysql_numrows($result);
  // - check return
  if($num != 0){
  //echo "<b>info:</b><br /><br />";
   $out = "\n<!-- account report small -->\n".'<br /><br /><table border="0" class="table-account-report" cellpadding="0" cellspacing="0">'."\n";
   $out .= "<tr><th>Your Account Balance</th><th></th></tr>\n";
   while ($row = mysql_fetch_array($result)) {

  }
  }
}
	
// display balance and dollar amount
function accountReportSml($userID) {  
  $dbh = connect();
  $sql = "SELECT account.exchangeRate, account.balance FROM account WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute query</span>");
  $num = mysql_numrows($result);
  // - check return
  if($num != 0){
  //echo "<b>info:</b><br /><br />";
   $out = "\n<!-- account report small -->\n".'<br /><br /><table border="0" class="table-account-report" cellpadding="0" cellspacing="0">'."\n";
   $out .= "<tr><th>Your Account Balance</th><th></th></tr>\n";
   while ($row = mysql_fetch_array($result))
    {
     $exchangeRate = (float)$row['exchangeRate'];
     $balance = (float)$row['balance'];
     $cashValue = (float)$balance * $exchangeRate;
     $out .= '<tr><td><span class="account-balance">' . $balance . '</span> <i>Chore Points</i></td><td class="account-cash-value">$'. $cashValue . ' <i>Cash Value</i></td></tr>'."\n";
     } 
     $out .= "</table>\n<!-- end account report small -->\n\n";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 


// display balance, exchangerate and dollar amount
function accountReportLrg($userID) {  
  $dbh = connect();
  $sql = "SELECT account.exchangeRate, account.balance FROM account WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute query</span>");
  $num = mysql_numrows($result);
  // - check return
  if($num != 0){
  //echo "<b>info:</b><br /><br />";
   $out = '<br /><br /><table border="0" class="table-account" cellpadding="0" cellspacing="0">';
   $out .= '<tr><th>Balance</th><th>Exchange Rate</th><th>Account Cash Value</th></tr>';
   while ($row = mysql_fetch_array($result))
    {
     $exchangeRate = (float)$row['exchangeRate'];
     $balance = (float)$row['balance'];
     $cashValue = (float)$balance * $exchangeRate;
     $out .= '<tr><td><span class="account-balance">' . $balance . '</span> <i>Chore Points</i></td><td class="account-exchange-rate">' . $exchangeRate . '</td><td class="account-cash-value">$'. $cashValue . '</td></tr>';
     } 
     $out .= "</table>";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 

// return user's chore point exchange rate
function getExchangeRate($userID){
  $dbh = connect();  
  $sql = "SELECT account.exchangeRate FROM account WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute exchagne rate query</span>");
   $row = mysql_fetch_array($result);
   $rate = $row['exchangeRate'];
 return $rate;

}	





// return user's chore point exchange rate
function setExchangeRate($userID,$rate){
  $dbh = connect();  
  $sql = "UPDATE `account` SET `exchangeRate` = '$rate' WHERE userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not change user exchange rate.</span>");
} 	

 
 
// return user chore point balance
function isGroupsSetup($userID){
  $dbh = connect();  
  $sql = "SELECT id FROM group WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute get balance query</span>");
   $row = mysql_fetch_array($result);
   $balance = $row['balance'];
   return $balance;

}	 
 
 
 
 

// return user chore point balance
function getBalance($userID){
  $dbh = connect();  
  $sql = "SELECT account.balance FROM account WHERE account.userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute get balance query</span>");
   $row = mysql_fetch_array($result);
   $balance = $row['balance'];
   return $balance;

}	

function isUser($email){
	   $dbh = connect(); 
  $sql = "SELECT id from `user` WHERE email = '$email'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute userID query");
    while ($row = mysql_fetch_array($result))
    {
     $userID = $row['id'];
    } 	
   if($userID > 0){
     return true;
   }else{
   	 return false;
   }
}	


// return user chore point balance
function getTypeName($typeID){
  $dbh = connect();  
  $sql = "SELECT `name` FROM `type` WHERE `id` = '$typeID'";
  $result = mysql_query($sql,$dbh) or die("<span style='error'>could not execute type query</span>");
  $row = mysql_fetch_array($result);
   $name = $row['name'];
   return $name;

}	


// return user chore point balance
function getPrizeCost($prizeID){
  $dbh = connect();  
  print "PRIX:$prizeID<br />";
  $sql = "SELECT moneyValue FROM prize WHERE id = $prizeID";
  $result = mysql_query($sql,$dbh) or die("<span style='error'>could not execute prize cost query</span>");
  $row = mysql_fetch_array($result);
   $cost = $row['moneyValue'];
    print "COST1:$cost<br />";
    return $cost;

}	
function deposit($userID,$amount){
  $dbh = connect();  
  $sql = "UPDATE `account` SET `balance` = '$amount' WHERE userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='error'>could not execute deposit update</span>");
  
}	


// withdraw chore points from user's account
function withdrawal($userID,$prizeID){
  $dbh = connect();  
  $balance = getBalance($userID);
  $cost = dollarsToChorePoints($userID,getPrizeCost($prizeID));
  
  $balance = ($balance - $cost);
  print "COST:$cost<br />";
  print "BALANCE:$balance<br />";
  $sql = "UPDATE `account` SET `balance` = '$balance' WHERE userID = $userID";
  $result = mysql_query($sql,$dbh) or die("<span style='error'>could not execute withdrawl update</span>");
  return $balance;

}	




// return chore points based on user exchange rate and dollar amount
function dollarsToChorePoints($userID,$dollarAmount){
   $dbh = connect();  
   $chorepoints = ($dollarAmount / getExchangeRate($userID));
  return $chorepoints;
}	


// return true if a is bigger then b
function isBigger($a,$b){
	 if($a>$b){
         return true;
	 }else{
	 	 return false;
	 }
}

// return chore points still required for user to purchase a given dollar amount
function getChorePointsLeft($userID,$dollarAmount){
  $dbh = connect();  
  // get user's chore point balance
  $userChorePoints= getBalance($userID);
  // convert prize dollar value into chorepoints
  $prizeChorePoints = dollarsToChorePoints($userID,$dollarAmount);
  // compare which one is bigger (for proper subtraction)
  if(isBigger($userChorePoints,$prizeChorePoints)){
  	// figure difference
   	$choresLeft = ($userChorePoints - $prizeChorePoints);
  }else{
  	// figure difference 
  	$choresLeft = ($prizeChorePoints - $userChorePoints);
  } 	
 // return difference 
 return $choresLeft;

}	



function sendEmail($userID,$subject,$content){
$to = getUserEmail($userID);
$subject = "$subject";
$body = "$content";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

if (mail($to, $subject, $body, $headers))
  {
   return("<p>Message sent!</p>");
  }else{
   return("<p>Message delivery failed...</p>");
  }
}	

function getUserEmail($userID){
   $dbh = connect();
   $sql = "SELECT user.email FROM user WHERE user.id = '$userID'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   $row = mysql_fetch_array($result);
   $email = $row['email'];
   return $email;  
   
}

function userList_SelectField($selectedUser){
   $dbh = connect();
   $sql = "SELECT user.id, user.name, user.username FROM user WHERE user.id IS NOT NULL"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   
   $content .= "<table class='user-list'><tr><td>Pick a user:<td><td><select name='postedID'>";
   
   while ($row = mysql_fetch_array($result))
    {
      $userID = $row['id'];
      $action = $row['action'];
      $timestamp = $row['timestamp'];
      $name = $row['name'];
      $username = $row['username'];
      
      if($userID == $selectedUser){
      $content .= "<option value='$userID' selected='selected'>$username $name $userID</option>";
      }else{
      $content .= "<option value='$userID'>$username $name $userID</option>";
      }
    }
    $content .="</select></td></tr></table>";
    return $content; 
}	

function select_TYPE($selected=0,$onchange=0){
   $dbh = connect();
   $sql = "SELECT id, name, description FROM type"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query to build TYPE select field");
   
   if(!$onchange){
   $c = "<select name='typeID'>";
   }else{
   $c = "<select name='typeID' onchange='updateForm()'>";
   }
   
   $c .= '<option value="-">Please make a selection</option>';
   while ($row = mysql_fetch_array($result))
    {
      $typeID = $row['id'];
      $name = $row['name'];
      $desc = $row['description'];
      
      if($selected == $typeID){
      $c .= '<option value="'.$typeID.'" selected="selected">'.$name.'</option>';
     }else{
      $c .= '<option value="'.$typeID.'">'.$name.'</option>';
     }
     
     
      }  
   $c .= '</select>';
   return $c;
}


function select_GROUP($typeID,$selected){
   $dbh = connect();
   $sql = "SELECT id, name, description FROM `group` WHERE typeID = '$typeID'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query to build GROUP select field");
   
   $c = "<select name='groupID'>";
   
   while ($row = mysql_fetch_array($result))
    {
      $groupID = $row['id'];
      $name = $row['name'];
      $desc = $row['description'];
      
      if($selected == $groupID){
      $c .= '<option value="'.$groupID.'" selected="selected">'.$name.'</option>';
      }else{
      $c .= '<option value="'.$groupID.'">'.$name.'</option>';	
      }	
      
      }  
   $c .= '</select>';
   return $c;
}


function setStyle($userID,$styleID){
    $dbh = connect();
      $sql = "UPDATE user SET style = '$styleID' WHERE id = '$userID'"; 
  $result = @mysql_query($sql,$dbh) or die("could not execute style query");
 }	
 
 
function getStyleID($css){
	  $dbh = connect();
   $sql = "SELECT id FROM style WHERE css = '$css'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute style id query");
      $row = mysql_fetch_array($result);
   $id = $row['id'];
   return $id;
 }	
 
 function getStyleCSS($id){
	  $dbh = connect();
   $sql = "SELECT css FROM style WHERE id = '$id'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute style file query");
      $row = mysql_fetch_array($result);
   $css = $row['css'];
   return $css;
 }	

function getUserName($userID){
  $dbh = connect();  
  $sql = "SELECT name FROM user WHERE id = '$userID'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute user name query</span>");
   $row = mysql_fetch_array($result);
   $name = $row['name'];
 return $name;
}	


// return user's chore point exchange rate
function getUserImgStyle($css){
  $dbh = connect();  
  $sql = "SELECT name FROM style WHERE css = '$css'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute style name query</span>");
   $row = mysql_fetch_array($result);
   $name = $row['name'];
 return $name;
}	
function select_STYLE($selected){
   $dbh = connect();
   $sql = "SELECT id, name FROM `style`"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute style query");
   
   $c = "<select name='styleID'>";
   
   while ($row = mysql_fetch_array($result))
    {
      $id = $row['id'];
      $name = $row['name'];
            
      if($selected == $id){
      $c .= '<option value="'.$id.'" selected="selected">'.$name.'</option>';
      }else{
      $c .= '<option value="'.$id.'">'.$name.'</option>';	
      }	
      
      }  
   $c .= '</select>';
   return $c;
}




?>