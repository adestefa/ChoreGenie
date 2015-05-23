<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
     $content = "";
    $c = file($DOCUMENT_ROOT . "/templates/forms/redeem.tmpl");
      $c = str_replace("##SERIAL##", "", $c);
      $c = str_replace("##ADMIN##", "", $c);
      $c = str_replace("##VALUE##", "", $c);
      $c = str_replace("##DATE##", "", $c); 
      $content .= '<br /><hr class="divider" /><br />';
      $content .= implode("", $c); 
     
    // set page title 
   $doc_title = "Redeem Chore Point";
   
   // set white space title
   $page_title = "<b>Redeem Chore Point</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);    
 ?>
  
  
  
