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
   $sql = "SELECT id, name, description from `group` ORDER BY name";
   $result = @mysql_query($sql,$dbh) or die("could not execute group query");


  $content .= '<form action="/zbin/addToGroup.php" method="post">';
  $content .= '<table class="table-family-list"><tr><th></th><th></th></tr>';
  while ($row = mysql_fetch_array($result))
   {
    $id = $row['id'];
    $name = $row['name'];
    $content .= "<tr><td><input type=\"checkbox\" name=\"id\" value=\"$id\"></td><td>$name</td></tr>"; 
   }
   $content .= '<tr><td colspan="2"><input type="submit" value="Add to Group" /></td></tr>';
   $content .= '</table></form>';
     
   #$c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   #$content .= implode("", $c);
   
      
   // set page title 
   $doc_title = "User to Group Association";
   
   // set white space title
   $page_title = "<b>User to Group association</b>";
    
   
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);        
?>


