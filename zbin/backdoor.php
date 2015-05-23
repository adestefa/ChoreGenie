<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
  
   $user = $_GET{'userid'};
   $postedID = $_POST{'postedID'};
   $amount = $_POST{'amount'};
   
   print "<span style='color:ffffff'>$user</span>";
   
   if($amount > 0){
    
    if($user != ""){
    $balance = getBalance($user);
     }elseif($postedID != ""){
    $balance = getBalance($postedID);
    }else{
    $balance = getBalance($p->userID);
    }
    
    $amount = ($balance + $amount);
   	
   	
   	
   	if($user != ""){
   	      deposit($user,$amount);
   	}elseif($postedID != ""){
   	 	    deposit($postedID,$amount);   
   	}else{
   		  deposit($p->userID,$amount); 
   	}
   
   }	
   
  // define page content (chore list)
   
   if($user != ""){
   $content = accountReportLrg($user);
   }elseif($postedID != ""){
    $content = accountReportLrg($postedID);
   }else{
    $content = accountReportLrg($p->userID);
   }
   
   
   $content .=  '<form action="/zbin/backdoor.php" method="post"><table><tr><td>';
   
   if($user != ""){
      $content .= userList_SelectField($user);
   }elseif($postedID != ""){
   	  $content .= userList_SelectField($postedID);
   }else{
      $content .= userList_SelectField($p->userID);
   }
   	
   $content .= '</td><td><input type="text" name="amount" /></td><td><input type="submit" value="Deposit" /></td></tr></table></form>';     
  
      
   // set page title 
   $doc_title = "Backdoor";
   
   // set white space title
   $page_title = "<b>BackDoor</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
             
   
 ?>
  
  
  
