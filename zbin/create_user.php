<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
   
   $typeID = $HTTP_POST_VARS{'typeID'};
   if($typeID == ""){
   	 $typeID = 0;
   	  }

   
   $c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   $content .= implode("", $c);
   
     
   $typeSelectField = Select_TYPE();
   $groupSelectField = Select_GROUP($typeID);
   $c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   $c = str_replace("##SELECT-TYPE##", $typeSelectField, $c);
    $c = str_replace("##SELECT-GROUP##", $groupSelectField, $c);
   $content = implode("", $c);
   
   // set page title 
   $doc_title = "Create User";
   
   // set white space title
   $page_title = "<b>Create New User</b>";
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       
   
?>