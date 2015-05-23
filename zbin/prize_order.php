<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
     
   // get prizeID to order
   $prizeID = $HTTP_POST_VARS{'prizeID'};
    
    // make sure we have a prize ID
    if($prizeID != ""){
    	
    	// get user balance
        $balance = withdrawal($p->userID,$prizeID);
    	
    	     $result = orderPrize($prizeID,$p->userID);
             if($result){ 
             	 $content = "your prize has been ordered, your new balance is $balance.";
    	     }else{
          	     $content = 'Sorry, there was a database problem, please <a href="/zbin/prizes.php">try again</a>';
    	     }
    }else{
    	$content = 'Please define a prize and <a href="/zbin/prizes.php">try again</a>';
    } 	
    
         
  // set page title 
   $doc_title = "Prize confirmation";
   
   // set white space title
   $page_title = "<b>Prize confirmation</b>";
    
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
 ?>
  
  
  
