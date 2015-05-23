<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
   # $content = $p->report();
       
    
   $typeSelectField = Select_TYPE(1);
   $c = file($DOCUMENT_ROOT . "/templates/forms/new_group.tmpl");
   $c = str_replace("##SELECT-TYPE##", $typeSelectField, $c);
   $content = implode("", $c);
   
      
   // set page title 
   $doc_title = "Create a new User Group";
   
   // set white space title
   $page_title = "<br /><br />";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);     
   
?>