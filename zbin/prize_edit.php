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
   $sql = "SELECT id, authorID, dateCreated, name, description, moneyValue, image, url FROM prize WHERE id = \"$id\"";
   $result = mysql_query($sql,$dbh) or die("could not execute query");
   $admin = 1;
 
  while ($row = mysql_fetch_array($result))
  {
  $id = $row['id'];
  $authorID = $row['authorID'];
  $dateCreated = $row['dateCreated'];
  $name = $row['name'];
  $description = $row['description'];
  $moneyValue = $row['moneyValue'];
  $image = $row['image'];
  $url = $row['url'];
  
 
$content .= "<br /><br /><form name=\"edit\" action=\"/zbin/prize_update.php\" method=\"post\" >";
$content .= "<input type=\"hidden\" name=\"id\" value=\"$id\" /><input type=\"hidden\" name=\"authorID\" value=\"$authorID\" /><table><table border=\"0\" class=\"table-prize-create\">";
$content .= "<tr><td><b>Name</b></td><td><input type=\"text\" name=\"name\" value=\"$name\" size=\"60\" /></td></tr>";
$content .= "<tr><td><b>Description</b></td><td><textarea rows=\"10\" cols=\"50\" name=\"description\">$description</textarea></td></tr>";
$content .= "<tr><td><b>Image</b></td><td><input type=\"text\" name=\"image\" value=\"$image\" size=\"60\" /></td></tr>";
$content .= "<tr><td><b>Value</b></td><td><input type=\"text\" name=\"moneyValue\" value=\"$moneyValue\" size=\"60\"></td></tr>";
$content .= "<tr><td><b>URL</b></td><td><input type=\"text\" name=\"url\" value=\"$url\" size=\"60\" /></td></tr>";
$content .= "<tr><td align=\"right\" colspan=\"2\"><input type=\"button\" value=\"Back\" onclick=\"history.go(-1)\" /><input type=\"submit\" value=\"save\" /></td></tr></table></form>";
$content .= " ";
$content .="<script>";
$content .="function cleanForm(){";
//$content .="document.edit.image.value = escape(document.edit.image.value);";
$content .="document.edit.url.value = escape(document.edit.url.value);";
$content .="return true;}";
$content .="</script>";
}
 

 
 
   
    
       
   // set page title 
   $doc_title = "Edit Prize";
   
   // set white space title
   $page_title = "<b>Edit prize information</b>";
    
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 
   
   ?>

