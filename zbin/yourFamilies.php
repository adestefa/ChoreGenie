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
   $sql = "SELECT familyID from user_family_rel WHERE userID = '$p->userID'";
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   $sql ="SELECT user_family_rel.familyID, family.name FROM user_family_rel, family WHERE userID = ' AND user_family_rel.familyID = family.id";

  $content .= '<table class="table-family-list">';
  while ($row = mysql_fetch_array($result))
   {
    $id = $row['familyID'];
    
    $content .= "<tr><td><input type=\"checkbox\" name=\"id\" value=\"$id\"></td><td>$name</td></tr>"; 
   }
   $content .= '<tr><td colspan="2"><input type="submit" value="Add to family" /></td></tr>';
   $content .= '</table></form>';
   
   #$c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   #$content .= implode("", $c);
   
      
   // set page title 
   $doc_title = "Family association";
   
   // set white space title
   $page_title = "<b>Family association</b>";
    
  
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       
?>


