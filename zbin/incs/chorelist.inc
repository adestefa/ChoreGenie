<?php

/*
 *
 * build sidebar list of chores showing name and price
 *
 *
 *
 */

function Chores(){
 $out = getChores();
 $out .= "<br /><br />";
 //$out .= getChoresDesc();
 //$out .= "<br /><br />";
 $out .= pickChoreList(1);
 return $out;
	
}	
	
// display quick chore information 
function getChores() {  
  $dbh = connect();
  $sql = "SELECT chore.id, chore.name, chore.point_value FROM chore WHERE chore.id IS NOT NULL";
  $result = mysql_query($sql,$dbh) or die("could not execute query</span>");
  $num = mysql_numrows($result);
 
  // - check return
  if($num != 0){
  //echo "<b> chores found!</b><br /><br />";

   $out = '<table border="1" class="table-chore" width="500" cellpadding="0" cellspacing="0">';
   $out .= '<tr><th align="left">Points</th><th align="left">Chore</th></tr>';
   
   while ($row = mysql_fetch_array($result))
    {
     $choreid = $row['id'];
     $chorename = $row['name'];
     $chorevalue  = $row['point_value'];
       
      if($choreid != ""){
        $out .= '<tr><td align="left">' . $chorevalue . '</td><td class="chorename">' . $chorename . '</td></tr>';
       }
     } 
     $out .= "</table>";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 












// display extended chore information
function getChoresDesc() {  
  $dbh = connect();
#  $sql = "SELECT chore.name, chore.description, chore.dateCreated, chore.image, chore.complexityID, chore.point_value, chore.userID, user.id, user.username
#         FROM chore, user WHERE chore.name IS NOT NULL AND chore.userID = user.id";

 $sql = "SELECT chore.id, chore.name, chore.description, chore.dateCreated, chore.image, chore.complexityID, chore.point_value FROM chore WHERE chore.id IS NOT NULL";
 
  $result = mysql_query($sql,$dbh) or die("could not execute query</span>");
  $num = mysql_numrows($result);
  
  // - check return
  if($num != 0){
  //echo "<b> chores found!</b><br /><br />";

   $out = '<table border="0" width="500" cellpadding="0" cellspacing="0" class="table-chore-desc">';
   $out .= '<tr><th>Points</th><th>Chore</th><th>Description</th><th>Created</th><th>Image</th><th>complexity</th></tr>';
   while ($row = mysql_fetch_array($result))
    {
     $choreid = $row['id'];
     $chorename = $row['name'];
     $choredesc = $row['description'];
     $choreDate = $row['dateCreated'];
     $choreImage = $row['image'];
     $choreComplexityID = $row['complexityID'];
     $chorevalue  = $row['point_value'];

     if(is_null($choreImage)){
     	 $choreImage = "../imgs/default/choregenie.gif";
     }
      
      if(is_null($choreImage) or $choreImage=== ""){
      	 $choreImage = "/imgs/default/chore.jpg";
      }
      
      if($choreid != ""){
        $out .= '<tr><td>' . $chorevalue . '</td><td class="chorename">' . $chorename . '</td><td>' . $choredesc .'</td><td>' . $choreDate . '</td><td><img src="' . $choreImage . '" width="50" height="50" /></td><td class="table-chore-complex">' . $choreComplexityID . '</td></tr>';
       }
     } 
     $out .= "</table>";
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 




// return frequency interval select field
function frequencyList() {
  $dbh = connect();
  $sql = "SELECT `id`, `interval` FROM `frequency`";
  $result = mysql_query($sql,$dbh) or die("could not execute frequency query</span>");
  $num = mysql_numrows($result);
  $out = '<select name="interval">';
   while ($row = mysql_fetch_array($result))
    {
     $id = $row['id'];
     $name = $row['interval'];
     $out .= '<option value="' . $id . '">' . $name . '</option>';
    }
  $out .= "</select>";
  return $out;
}


// chore list with checkboxes for actions (0 = remove || 1 = add)
function pickChoreList($type) {  
  $dbh = connect();
  if($type == 0){
  $sql= "SELECT user_chore_rel.choreID, user_chore_rel.stateID, chore.id, chore.name, chore.description, chore.dateCreated, chore.image, chore.complexityID, chore.point_value FROM user_chore_rel, chore WHERE user_chore_rel.userID = '$userID' AND chore.id = user_chore_rel.choreID";
  }else{
  $sql = "SELECT chore.id, chore.name, chore.description, chore.dateCreated, chore.image, chore.complexityID, chore.point_value FROM chore WHERE chore.id IS NOT NULL";	
  }		
  $result = mysql_query($sql,$dbh) or die("could not execute chore query");
  $num = mysql_numrows($result);
  $intervalSelectField = frequencyList();
  
   $out = '<form action="/zbin/chore_remove.php" method="post"><table border="0" width="500" cellpadding="0" cellspacing="0" class="table-chore-desc">';
   $out .= '<tr><th></th><th>Frequency</th><th>Points</th><th>Chore</th><th>Description</th><th>complexity</th><th></th></tr>';
   while ($row = mysql_fetch_array($result))
    {
     $choreid = $row['id'];
     $chorename = $row['name'];
     $choredesc = $row['description'];
     $choreDate = $row['dateCreated'];
     $choreImage = $row['image'];
     $choreComplexityID = $row['complexityID'];
     $chorevalue  = $row['point_value'];
     $out .= '<tr><td align="center"><input type="checkbox" name="choreID" value="' . $choreid  . '" /></td><td>' . $intervalSelectField . '</td><td>' . $chorevalue . '</td><td class="chorename">' . $chorename . '</td><td>' . $choredesc .'</td><td class="table-chore-complex">' . $choreComplexityID . '</td></tr>';
     } 
     $out .= '<tr><td colspan="6" align="right"><input type="submit" value="Pick Chores" /></form></table>';
 return $out;   
} 




function isChore($choreID,$userID){
	print "PRIZE:".$choreID."  USER:".$userID."<br>";
  $dbh = connect();
  $sql= "SELECT user_chore_rel.choreID FROM user_chore_rel WHERE user_chore_rel.userID = '$userID' AND user_chore_rel.choreID = '$choreID'";
  $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute chore query</span>");
  $num = mysql_numrows($result);
  if($num > 0){
    return true;	
  }else{
  	return false;	
  } 
}	

function removeChoreRel($choreID,$userID){
   print "P:$choreID - U:$userID<br />";
   $dbh = connect();
   $sql = "DELETE FROM user_chore_rel WHERE userID = '$userID' && choreID = '$choreID'"; 
   $result = @mysql_query($sql,$dbh) or die("could not remove chore");
}	
	
function saveUserChoreRel($userID,$choreID){
   $dbh = connect();
   $date = Date("Y-m-d");
   $sql = "INSERT INTO `user_chore_rel` (`id`, `userID`, `choreID`, `frequencyID`, `stateID`) VALUES ('', '$userID','$choreID',1 ,1)"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
}	
	

?>