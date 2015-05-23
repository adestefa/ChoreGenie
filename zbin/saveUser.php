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
   $un = $HTTP_POST_VARS{'username'}; 
   $rating = $HTTP_POST_VARS{'rating'};
   $admin = $HTTP_POST_VARS{'admin'};
   $email = $HTTP_POST_VARS{'email'};
   $pass = $HTTP_POST_VARS{'pass'};
   $typeID = $HTTP_POST_VARS{'typeID'};
   
   $dbh = connect();
   $sql = "INSERT INTO `user` (`name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES ('$name', '$un', '$rating', '$admin', '$email', '$pass', '0', '$typeID')"; 
   $result1 = @mysql_query($sql,$dbh) or die("could not execute query");
   
  
   $sql = "SELECT id from `user` WHERE user.email = '$email'"; 
   $result2 = @mysql_query($sql,$dbh) or die("could not execute query");
   
   while ($row = mysql_fetch_array($result2))
    {
     $userID = $row['id'];
    } 
   print "ID:$userID";
   $dbh = connect();
    $date = Date("Y-m-d");
  $sql = "INSERT INTO `account` (`userID`,`exchangeRate`, `balance`, `dateCreated`) VALUES ('$userID','0.25','5','$date')"; 
  $result3 = @mysql_query($sql,$dbh) or die("could not execute query");
   
   
  $form = <<<EOD
<br /><br /><center><h2>User changes saved!</h2><br />
<form action="" method="post">
<table >
<tr><td><b>Name</b></td><td><input type="text" name="name" value="$name" size="20"></td></tr>
<tr><td><b>User name</b></td><td><input type="text" name="username" value="$un" size="20"></td></tr>
<tr><td><b>Rating</b></td><td><input type="text" name="rating" value="$rating" size="20"></td></tr>
EOD;

if($admin) {
$form .= "<tr><td><b>Admin</b></td><td><input type=\"checkbox\" name=\"admin\" checked /></td></tr>";
}else{
$form .= "<tr><td><b>Admin</b></td><td><input type=\"checkbox\" name=\"admin\" /></td></tr>";
}

$form .= <<<EOD
<tr><td><b>Email</b></td><td><input type="text" name="email" value="$email" size="20"></td></tr>
<tr><td><b>Pass</b></td><td><input type="text" name="pass" value="$pass" size="20"></td></tr>
</table>
</form>
EOD;
    $content = $form;
    
      
   // set page title 
   $doc_title = "Save new user";
   
   // set white space title
   $page_title = "<b>Save user</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  



?>