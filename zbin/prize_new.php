<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
  #  $content = $p->report();
       
    
   $c = file($DOCUMENT_ROOT . "/templates/forms/create_prize.tmpl");
   $content .= implode("", $c);
      
   // set page title 
   $doc_title = "Create Prize";
   
   // set white space title
   $page_title = "<b>Create New Prize</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 
   
?>