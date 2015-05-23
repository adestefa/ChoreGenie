<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content (chore list)
   # $content = $p->report();

   $content = "";
   $dbh = connect();
   $sql ="SELECT DISTINCT user_family_rel.familyID, family.name FROM user_family_rel, family WHERE userID =  '$p->userID' AND user_family_rel.familyID = family.id";
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
 
  $content .= '<table class="table-family-list"><tr><td><ul>';
  while ($row = mysql_fetch_array($result))
   {
    $id = $row['familyID'];
    $name = $row['name'];
    $content .= "<li class='group-name'>$name</li>"; 
   }
    $content .= '</ul></td></tr></table></form>';
  
   #$c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   #$content .= implode("", $c);
   
      
   // set page title 
   $doc_title = "Family association";
   
   // set white space title
   $page_title = "<b>Your groups</b>";
    
  sendPage($doc_title,$page_title,$content);       
?>


