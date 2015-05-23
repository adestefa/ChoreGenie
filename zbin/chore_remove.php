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
   print sizeof($choreID)."<br />";
   
   
   for($i=0;$i<sizeof($choreID);$i++){
   	 $content .= "USER:".$p->userID." WISH:".$choreID[$i];
   	  $t = isChore($choreID[$i],$p->userID);
   	 $content .= "<br />T:$t<br>";
   	 if($t){
       
         removeChoreRel($p->userID,$choreID[$i]);
   	 }
     $content .= "<br />";
   }
  
    $content .= "done.";
  
    $content .= getChores();
    
    
     
   // set page title 
   $doc_title = "Chore(s) removed";
   
   // set white space title
   $page_title = "<b>Your chore(s) has been saved to your account!</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       
  



?>