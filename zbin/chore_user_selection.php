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
   print sizeof($chores)."<br />";
   
   
   for($i=0;$i<sizeof($chores);$i++){
   	 $content .= "USER:".$p->userID." CHORE:".$chores[$i];
   	  $t = isFamilyChore($chores[$i],$p->userID);
   	 $content .= "T:$t<br>";
   	 if(!$t){
         print "Chore is not associated to family<br>";
         saveFamilyChoreRel($p->userID,$wish[$i]);
   	 }
     $content .= "<br />";
   }
  
    $content .= "done.";
  
    $content .= viewFamilyChoreList($p->userID);
    
    
      
   // set page title 
   $doc_title = "Prize Saved";
   
   // set white space title
   $page_title = "<b>Your prize has been created!</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
        



?>