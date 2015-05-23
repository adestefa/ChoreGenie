<?php
   
   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
   //$numChorePointTiks = $HTTP_POST_VARS{'numChorePointTiks'};
  
  for($i=0;$i<10;$i++) { 
   $sid = "";
   $random = (rand()%100000);
   $sid = $PHPSESSID;
   $sid = strtoupper($sid) . $random;
   $sid = substr($sid, 25, 35);
   addChorePoint(1,$userId,$sid);
  }
   
   
   $out = findChorePoints($userId);
     
       
  
       
   // set page title 
   $doc_title = "Home portal";
   
   // set white space title
   $page_title = "<b>Welcome $p->name</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);     
   

 
?>









