<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
 
   $content = accountReportSml($p->userID);
   $content .= "<br /><br />";
   $content .= getPrizesForSelection($p->userID);
   
     
   // set page title 
   $doc_title = "Select a Prize";
   
   // set white space title
   $page_title = "<b>Select a Prize</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);      
   
 ?>
  
  
  
