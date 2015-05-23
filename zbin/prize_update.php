<?

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   #$content = $p->report();
   
   $HTTP_POST_VARS{'id'};
   
  $id = $HTTP_POST_VARS{'id'};
  $authorID = $HTTP_POST_VARS{'authorID'};
  $dateCreated = $HTTP_POST_VARS{'dateCreated'};
  $name = $HTTP_POST_VARS{'name'};
  $description = $HTTP_POST_VARS{'description'};
  $moneyValue = $HTTP_POST_VARS{'moneyValue'};
  $image = $HTTP_POST_VARS{'image'};
  $url = $HTTP_POST_VARS{'url'};
 
  print "ID:$id<br />NAME:$name<br />";
   $dbh = connect();
  # $sql = "UPDATE `user` SET (`name`, `username`, `rating`, `admin`, `email`, `password`, `style`) VALUES ('$name', '$un', '$rating', '$admin', '$email', '$pass', '0')"; 
    $sql = "UPDATE `prize` SET `id` = '$id', `authorID` = '$authorID', `dateCreated` = '$dateCreated', `name` = '$name', `description` = '$description', `moneyValue` = '$moneyValue', `image` = '$image', `url` = '$url' WHERE `id` = '$id' LIMIT 1";   
    
    print "SQL:$sql<br />";
    
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
  
 
$content .= "<br /><br /><form action=\"/zbin/prize_edit.php\" method=\"post\">";
$content .= "<input type=\"hidden\" name=\"id\" value=\"$id\" /><table><table border=\"0\" class=\"table-prize-create\">";
$content .= "<tr><td><b>Name</b></td><td>$name</td></tr>";
$content .= "<tr><td><b>Description</b></td><td>$description</td></tr>";
$content .= "<tr><td><b>Image</b></td><td>$image</td></tr>";
$content .= "<tr><td><b>Value</b></td><td>$moneyValue</td></tr>";
$content .= "<tr><td><b>URL</b></td><td>$url</td></tr>";
$content .= "</table></form>";
    
       
   // set page title 
   $doc_title = "Prize - Update";
   
   // set white space title
   $page_title = "<b>Update saved!</b>";
    
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 


?>