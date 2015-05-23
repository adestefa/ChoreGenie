<?php

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   

   $prizeID = $HTTP_POST_VARS{'prizeID'};
   removeWish($prizeID,$p->userID);
   
   $content = viewPrizeWishList($p->userID);
       
    
     
   // set page title 
   $doc_title = "Wish Removed";
   
   // set white space title
   $page_title = "<b>Your wish has been removed from your list!</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
  



?>