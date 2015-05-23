<?php

$dbh;

function connect(){
$db_user = "chore2";
$db_pass = "dur1anki";
$db_name = "chore2_choregenie";
$dbh=mysql_connect ("localhost", $db_user, $db_pass) or die ('I cannot connect to the database because: ' . mysql_error());
 mysql_select_db ($db_name);
 return ($dbh);
}


?>