<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
   $content = pickChoreList(0);
       
      
   // set page title 
   $doc_title = "Remove a chore";
   
   // set white space title
   $page_title = "<b>Remove a chore</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);       
   
 ?>
  
  
  
