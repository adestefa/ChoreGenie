<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   $content = accountReportSml($p->userID);
   $content .= "<br /><br />";
   $content .= Prizes($p->userID);
   
   // load user template file
   $template = ($DOCUMENT_ROOT . $p->template);
   $template = file ("$template");
   $template = implode("", $template);
   
   // set image style
   $img_style = "default";
      
   // set page title 
   $doc_title = "Prizes";
   
   // set white space title
   $page_title = "<b>Prizes</b>";
    
   // load navbar include file
   if($p->admin == 1){
    $navbar = "admin_navbar.tmpl";
    }else{
    $navbar = "user_navbar.tmpl";
    }
   $navbar = file ($DOCUMENT_ROOT . "/templates/navigation/$navbar");
   $navbar = implode("", $navbar);
   
   $css = $p->css;
   // build page by combining data and send to client
   sendPage($template,$doc_title,$css,$img_style,$page_title,$navbar,$content);  
       
   
 ?>
  
  
  
