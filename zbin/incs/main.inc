<?php

 $br = "\n";

include_once $DOCUMENT_ROOT . "/zbin/incs/utilities.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/account.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/profile.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/db_conn.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/chorelist.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/prizelist.inc";
include_once $DOCUMENT_ROOT . "/zbin/incs/addChorePoint.inc";



$tr = '<tr onmouseover="setPointer(this, \'#66CCFF\')" onmouseout="setPointer(this, \'#FFFFFF\')">';


// create and send page to client
function sendPage($doc_title,$page_title,$content) {
   
     # lod user profile
     $p = unserialize($_SESSION['profile']);
     
     # figure out user navbar filename
     if($p->admin == 1){
      $navbar = "admin_navbar.tmpl";
     }else{
      $navbar = "user_navbar.tmpl";
     }
     
     # load the navbar file and insert inital data
     $navbar = file ($DOCUMENT_ROOT . "../templates/navigation/$navbar");
     $navbar = str_replace("##USERNAME##", $p->name, $navbar);
     $navbar = str_replace("##IMG_STYLE##", getUserImgStyle($p->css), $navbar);
     
     
     // ---- hightlight navigation ------ //
     
     # extract filename from loaded URL
     $l = $_SERVER['PHP_SELF'];
     $pos = strrpos($l, "/");
     $fileName = substr($l, ++$pos); 
     $pos = strrpos($fileName, ".");
     $fileName = substr($fileName, 0, $pos); 
     $classTag = "##$fileName##";
   
     # highlight current page in navbar
     $navbar = str_replace($classTag, "highlight", $navbar);
     
     # loop all other rows
     foreach ($navbar as $line_num => $line) {
     
      # extract marker name from line (##marker##) - if any -
      $startPosition = strpos($line, "##");
      $startPosition+=2;
      $lineName = substr($line, $startPosition); 
      $pos = strpos($lineName, "##");
      $lineName = substr($lineName, 0, $pos);
        
         # make sure we are working with a marked line
         if(strpos($line, "##")){
         	
         	# if line not highlighted then normal row css
      	    if($lineName != $fileName) {
      		   $marker = "##$lineName##";
               $navbar = str_replace($marker, "link", $navbar);
      	    }
         }
     }
          
        
     
     // ---- END hightlight navigation ------ //
    $navbar = implode("", $navbar);
      
      # load user template file
     $template = file ($DOCUMENT_ROOT . "../templates/layout/$p->template");
     $template = str_replace("##DOC_TITLE##", $doc_title, $template);
     $template = str_replace("##CSS##", trim("../styles/$p->css"), $template);
     $template = str_replace("##IMG_STYLE##", getUserImgStyle($p->css), $template);
     $template = str_replace("##PAGE_TITLE##", $page_title, $template);
     $template = str_replace("##NAVBAR##", $navbar, $template);
     $template = str_replace("##CONTENT##", $content, $template);
     $template = implode("", $template);
     print "$template";
}      


// $file must be full path from document root
function loadFile($file) {
   $file = $DOCUMENT_ROOT . "$file";
   print "FILE:$file<br />";
   $f = file ($file);
   $f = implode("", $f);
   return $f;
}

?>