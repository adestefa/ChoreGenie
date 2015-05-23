<?php

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   #$content = $p->report();
   
   $id;
   $name = $HTTP_POST_VARS{'name'};
   $description = $HTTP_POST_VARS{'description'};
   $value = $HTTP_POST_VARS{'value'};
   $image = $HTTP_POST_VARS{'image'};
   $date = Date("Y-m-d");
   $url = $HTTP_POST_VARS{'url'};
 
   $dbh = connect();
   $date = Date("Y-m-d");
   $sql = "INSERT INTO `prize` (`id`, `authorID`, `dateCreated`, `name`, `description`, `moneyValue`, `image`, `url`) VALUES ('', '$p->userID', '$date', '$name', '$description', '$value', '$image', '$url')"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   
  $form = <<<EOD
<br /><br /><center><h2>Saved prize</h2><br />
<table border="0" class="table-chore-saved">
<tr><td><b>Name</b></td><td>$name</td></tr>
<tr><td><b>Description</b></td><td>$description</td></tr>
<tr><td><b>Image</b></td><td>$image</td></tr>
<tr><td><b>Value</b></td><td>$value</td></tr>
<tr><td><b>URL</b></td><td>$url</td></tr>
</table>
EOD;
    $content = $form;
    
    
     
   // set page title 
   $doc_title = "Prize Saved";
   
   // set white space title
   $page_title = "<b>Your prize has been created!</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  



?>