<?php



function logAction($userID,$action="_blank_") {
   $dbh = connect();
   
  
   $sql = "INSERT into `log` SET `userID`=$userID, `action`='$action'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   
   
}
	

function timestamp2itdate($timestamp){ 
   return( substr($timestamp, 6, 2) . ':' . substr($timestamp, 8, 2) . ' ' . substr($timestamp, 4, 
2) . '/' . substr($timestamp, 2, 2) . '/20' . substr($timestamp, 0, 2) ); 
} 


?>