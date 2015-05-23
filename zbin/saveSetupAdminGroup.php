<?

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   $content = $p->report();
   
   $id;
  
   $name = $HTTP_POST_VARS{'name'};
   $description = $HTTP_POST_VARS{'description'};
   
   $dbh = connect();

   $sql = "INSERT INTO `group` (`name`, `timestamp`, `typeID`, `description`) VALUES ('$name', 'now()', '$p->typeID', '$description')"; 
   $user_result = @mysql_query($sql,$dbh) or die("could not execute new group insert");
   
   

  $typeName = getTypeName($p->typeID);
  
  $form = <<<EOD
 <br /><br /><h4>New User Group Created!</h4>
<form action="" method="post">
<table width="400">
<tr><td><b>Account Type</b></td><td>$typeName</td></tr>
<tr><td><b>Name</b></td><td>$first $last</td></tr>
<tr><td><b>Description</b></td><td>$phone</td></tr>
</table>
</form>


EOD;
    $content = $form;
    
       
   // set page title 
   $doc_title = "New Admin";
   
   // set white space title
   $page_title = "<b>New Administrator</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 


?>