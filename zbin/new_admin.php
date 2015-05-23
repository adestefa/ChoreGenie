<?php

   // continue session
  // session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   //$p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
   # $content = $p->report();
       
    
   
   $typeSelectField = Select_TYPE();
   $c = file($DOCUMENT_ROOT . "/templates/forms/new_admin.tmpl");
   $c = str_replace("##SELECT-TYPE##", $typeSelectField, $c);
   $content = implode("", $c);
   
    // set page title 
   $doc_title = "Register new Administrator Account";
   
   // set white space title
   $page_title = "<b>Register new Administrator Account</b>";
    
  
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 
?>