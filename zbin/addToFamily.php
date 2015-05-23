<?php

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   #$content = $p->report();
   
   $id = $HTTP_POST_VARS['id'];
    
 
   $dbh = connect();
   $date = Date("Y-m-d");
   $sql = "INSERT INTO `user_family_rel` (`id`, `userID`, `familyID`) VALUES ('', '$p->userID', '$id')"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   
   $dbh = connect();
   $sql = "SELECT name, timestamp FROM family WHERE id = '$id'"; 
    $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
    while ($row = mysql_fetch_array($result))
    {
     $family = $row['name'];
    }
   
   
  $form = <<<EOD
<br /><br /><center><h2>You have been added to the $family</h2><br />
EOD;
    $content = $form;
    
       
   // set page title 
   $doc_title = "Add to family";
   
   // set white space title
   $page_title = "<b>Family association</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       
  



?>