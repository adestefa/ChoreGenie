<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   $user = "anthony";
    
// Turn off all error reporting 
error_reporting(0); 

    // Parse the data submitted from the form 
    $number = trim(8456254217); 
    $subject = trim("choregenie.com"); 
    $message = trim("order placed by:$user"); 
   
    
    

    // Clarify that the phone number is numeric and that the subject and message have values 
    if ((is_numeric($number)) && ($number != "") && ($subject != "") && ($message != "")) { 

        // Send the text message (via Teleflip's service) 
        if (mail("$number@teleflip.com", $subject, $message)) { 

            // Give a success notice 
            $content = "Text message sent."; 
        } else { 
            // Give an error notice 
            $content = "Error while sending text message."; 
        } 

    } else { 
        // Tell the user to enter proper values 
        $content = "Please fill in all fields and make sure you entered the 10-digit phone number with no spaces or hyphens (-)."; 
    } 
    
    
  
      
   // set page title 
   $doc_title = "test msg";
   
   // set white space title
   $page_title = "test msg";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);     
   
?>