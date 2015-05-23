<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
  // $content = Chores();
   
  
   
   
   $one    = findChorePoints($p->userID,1); 
   $five   = findChorePoints($p->userID,5); 
   $ten    = findChorePoints($p->userID,10); 
   $twenty = findChorePoints($p->userID,20); 
   $fifty  = findChorePoints($p->userID,50); 
   

  $openCPvalue = unredeemedCPValue($p->userID);
  $page = <<<EOD
   <table border="0">
   <tr><td><br />Open Ticket Value:<b>$openCPvalue</b><br /><br />$one<br />$five<br />$ten<br />$twenty<br />$fifty</td></tr>
   </table>
EOD;


   
   $content = $page;
   
    
   
      
   // set page title 
   $doc_title = "ChorePoint Manager";
   
   // set white space title
   $page_title = "<b>ChorePoint Manager</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
            
   
 ?>
  
  
  