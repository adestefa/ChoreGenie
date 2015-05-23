<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
   $content = Chores();
       
       
   // set page title 
   $doc_title = "Chores";
   
   // set white space title
   $page_title = "<b>Chore Manager</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
             
   
 ?>
  
  
  
