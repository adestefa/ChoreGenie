<?php

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   #$content = $p->report();
   
  $content="";
   print sizeof($wish)."<br />";
   
   
   for($i=0;$i<sizeof($wish);$i++){
   	 $content .= "USER:".$p->userID." WISH:".$wish[$i];
   	  $t = isWish($wish[$i],$p->userID);
   	 $content .= "T:$t<br>";
   	 if(!$t){
         print "PRIZE IS NOT WISH<br>";
         saveUserPrizeRel($p->userID,$wish[$i]);
   	 }
     $content .= "<br />";
   }
  
    $content .= "done.";
  
    $content .= viewPrizeWishList($p->userID);
    
     
   // set page title 
   $doc_title = "Prize Saved";
   
   // set white space title
   $page_title = "<b>Your prize has been created!</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 
  



?>