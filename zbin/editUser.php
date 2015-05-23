<?php

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   $content ="";
   $id = $HTTP_POST_VARS{'id'};
   $dbh = connect();
   $sql = "SELECT id, name, username, rating, admin, email, password FROM user WHERE id = \"$id\"";
   $result = mysql_query($sql,$dbh) or die("could not execute query");
   $admin = 1;
 
  while ($row = mysql_fetch_array($result))
  {
  $name = $row['name'];
  $un = $row['username'];
  $rating = $row['rating'];
  $admin = $row['admin'];
  $email = $row['email'];
  $pass = $row['password'];
  }
 
$content .= "<form action=\"/zbin/updateUser.php\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"$id\" /><table>";
$content .= "<tr><td><b>Name</b></td><td><input type=\"text\" name=\"name\" value=\"$name\" size=\"20\"></td></tr>";
$content .= "<tr><td><b>User name</b></td><td><input type=\"text\" name=\"username\" value=\"$un\" size=\"20\"></td></tr>";
$content .= "<tr><td><b>Rating</b></td><td><input type=\"text\" name=\"rating\" value=\"$rating\" size=\"20\"></td></tr>";
 if($admin) {
 $content .= "<tr><td><b>Admin</b></td><td><input type=\"checkbox\" name=\"admin\" value=\"1\" checked=\"checked\" /></td></tr>";
 }else{
 $content .= "<tr><td><b>Admin</b></td><td><input type=\"checkbox\" name=\"admin\" value=\"0\" ></td></tr>";
 }
 $content .= "<tr><td><b>Email</b></td><td><input type=\"text\" name=\"email\" value=\"$email\" size=\"20\"></td></tr>";
$content .= "<tr><td><b>Pass</b></td><td><input type=\"text\" name=\"pass\" value=\"$pass\" size=\"20\"></td></tr>";
$content .= "<tr><td colspan=\"2\"><input type=\"submit\" value=\"Save\" /></td></tr></table></form>";

    
   // set page title 
   $doc_title = "Edit user information";
   
   // set white space title
   $page_title = "<b>Edit user information</b>";
    
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  

?>

