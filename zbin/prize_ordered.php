<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   
  
   $content = orderedPrizes($p->userID);
   $subject = "Your ordered prizes";
   
   
   //sendEmail($p->userID,$subject,$content,$p->name);
         
     
   // set page title 
   $doc_title = "Ordered Prizes";
   
   // set white space title
   $page_title = "<b>Ordered Prizes</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);        
   
 ?>
  
  
  
