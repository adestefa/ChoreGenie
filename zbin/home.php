<?php

   # continue session
   session_start();
   
   # load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   
   
    # load profile object from session
    $p = unserialize($_SESSION['profile']);
    
    
    # define page content (chore list)
    $content = "STYLE:$p->css<br />TEMPLATE:$p->template<br />";
    
    // set page title 
   $doc_title = "Home portal";
   
   // set white space title
   $page_title = "<b>Welcome $p->name</b>";
    
   
   
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       
   
?>