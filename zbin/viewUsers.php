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
   $sql = "SELECT id,name,username, rating from user ORDER BY username";
   $result = @mysql_query($sql,$dbh) or die("could not execute query");


  $content .= '<form action="/zbin/editUser.php" method="post">';
  $content .= '<table class="table-user-list"><tr><th></th><th>Username</th><th>Name</th><th>Rating</th></tr>';
  while ($row = mysql_fetch_array($result))
   {
    $id = $row['id'];
    $name = $row['name'];
    $un = $row['username']; 
    $rating = $row['rating'];
    $content .= "<tr><td><input type=\"radio\" name=\"id\" value=\"$id\"></td><td>$un</td><td>$name</td><td>$rating</td></tr>"; 
   
   }
   $content .= '<tr><td colspan="2"><input type="submit" value="Edit" /></td></tr>';
   $content .= '</table></form>';
   
   #$c = file($DOCUMENT_ROOT . "/templates/forms/create_user.tmpl");
   #$content .= implode("", $c);
   
  // set page title 
   $doc_title = "Edit User";
   
   // set white space title
   $page_title = "<b>Edit User</b>";
    
   
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);       
?>


