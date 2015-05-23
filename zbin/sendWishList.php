<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   $content = viewPrizeWishList($p->userID);
   $subject = "Your wish list";
   $content = sendEmail($p->userID,$subject,$content,$p->name);
   
   
  
   
    // set page title 
   $doc_title = "Prize Wish List";
   
   // set white space title
   $page_title = "<b>Your Wish list</b>";
    
     // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);    
   
 ?>
  
  
  
