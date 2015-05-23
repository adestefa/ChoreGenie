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
   $image = $HTTP_POST_VARS{'image'};
   $value = $HTTP_POST_VARS{'value'};
   $complexity = $HTTP_POST_VARS{'complexity'};
 
   $dbh = connect();
   $date = Date("Y-m-d");
   $sql = "INSERT INTO `chore` (`id`, `userID`, `dateCreated`, `name`, `description`, `image`, `point_value`, `complexityID`) VALUES ('', '$p->userID', '$date', '$name', '$description', '$image', '$value', '$complexity')"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   
  $form = <<<EOD
<br /><br /><center><h2>Chore saved!</h2><br />
<form action="/zbin/saveChore.php" method="post">
<input type="hidden" name="username" value="" />
<table border="0" class="table-chore-saved">
<tr><td><b>Name</b></td><td>$name</td></tr>
<tr><td><b>Description</b></td><td>$description</td></tr>
<tr><td><b>Image</b></td><td>$image</td></tr>
<tr><td><b>Value</b></td><td>$value</td></tr>
<tr><td><b>Complexity</b></td><td>$complexity</td></tr>
</table>

</form>

EOD;
    $content = $form;
    
        
   // set page title 
   $doc_title = "Chore Saved";
   
   // set white space title
   $page_title = "<b>Welcome $p->name</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 



?>