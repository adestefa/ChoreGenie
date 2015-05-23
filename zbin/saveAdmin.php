<?

 // continue session
  // session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   //$p = unserialize($_SESSION['profile']);
   
   // define page content
  // $content = $p->report();
   
   $id;
   
   $first = $HTTP_POST_VARS{'first'};
   $last = $HTTP_POST_VARS{'last'};
   $phone = $HTTP_POST_VARS{'phone'};
   $street = $HTTP_POST_VARS{'street'};
   $city = $HTTP_POST_VARS{'city'};
   $zip = $HTTP_POST_VARS{'zip'};
   $country = $HTTP_POST_VARS{'country'};
     
   $name = $first." ".$last;
   $un = $HTTP_POST_VARS{'username'}; 
   $rating = $HTTP_POST_VARS{'rating'};
   $admin = $HTTP_POST_VARS{'admin'};
   $email = $HTTP_POST_VARS{'email'};
   $pass = $HTTP_POST_VARS{'pass'};
   $group = $HTTP_POST_VARS{'group'};
   $typeID = $HTTP_POST_VARS{'typeID'};
   
   $err = 0;
   if(empty($un)){
   	 $err++;
   } 
   if(empty($email)){
   	 $err++;
   } 
   if(empty($pass)){
   	 $err++;
   } 
   if(empty($rating)){
   	 $err++;
   } 
   
   if(empty($first)){
   	 $err++;
   } 
   if(empty($last)){
   	 $err++;
   } 
   if(empty($phone)){
   	 $err++;
   } 
   if(empty($street)){
   	 $err++;
   } 
   if(empty($city)){
   	 $err++;
   } 
   if(empty($zip)){
   	 $err++;
   } 
   if(empty($country)){
   	 $err++;
   } 
   
   if($err > 0){
   	  	 
    $content = "Sorry you left $err fields blank.<br /> All fields are required, please <a href='javascript:history.go(-1)'>try again</a>";
   }   	 
   else{	 
   	 
   	 
   
   if(!isUser($email))
    {
   print "this far<br />";
   
   $dbh = connect();
   $sql = "INSERT INTO `user` (`name`, `username`, `rating`, `admin`, `email`, `password`, `style`, `typeID`) VALUES ('$name', '$un', '$rating', '$admin', '$email', '$pass', '0', '$typeID')"; 
   $user_result = @mysql_query($sql,$dbh) or die("could not execute new user query");
   
   $sql = "SELECT id from `user` WHERE user.email = '$email'"; 
   $result2 = @mysql_query($sql,$dbh) or die("could not execute query");
   
   while ($row = mysql_fetch_array($result2))
    {
     $userID = $row['id'];
    } 
     $form = "USERID:$userID<br />";
   $dbh = connect();
   $sql = "INSERT INTO `user_contact` (`userID`, `first`, `last`, `phone`, `street`, `city`, `state`, `zip`, `country`) VALUES ('$userID', '$first', '$last', '$phone', '$street', '$city', '$state', '$zip', '$country')"; 
   $contact_result = @mysql_query($sql,$dbh) or die("could not execute query");


  $typeName = getTypeName($typeID);
  
  $form = <<<EOD
 <br /><br /><h4>New Administrator Created!</h4>

<table width="400">
<tr><td><b>Account Type</b></td><td>$typeName</td></tr>
<tr><td><b>Name</b></td><td>$first $last</td></tr>
<tr><td><b>Phone</b></td><td>$phone</td></tr>
<tr><td><b>Street</b></td><td>$street</td></tr>
<tr><td><b>City</b></td><td>$city</td></tr>
<tr><td><b>State</b></td><td>$state</td></tr>
<tr><td><b>Zipcode</b></td><td>$zip</td></tr>
<tr><td><b>Country</b></td><td>$country</td></tr>
<tr><td><b>Admin</b></td><td>Yes</td></tr>
<tr><td><b>Email</b></td><td>$email</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">
<h3>To continue to the next step Please login:</h3>


<form name="login" class="iform" action="/zbin/login.php" method="post">
<table>
<tr><td><b>User</b></td><td><input type="text" name="user" value="$un" size="20" /></td></tr>
<tr><td><b>Pass</b></td><td><input type="password" name="pass" size="20" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="login" /></td></tr>
</table>
</form>
<script>
 document.login.pass.focus();
</script>

</td></tr>
</table>
</form>


EOD;
    $content = $form;
    
    }else{
    $content = "<br /><br /><br /><p class='error''><b>An account with that email already exists</b></p>Please try again";
  
    $typeSelectField = Select_TYPE();
   $c = file($DOCUMENT_ROOT . "/templates/forms/new_admin.tmpl");
   $c = str_replace("##SELECT-TYPE##", $typeSelectField, $c);
   $content .= implode("", $c);
    } 


   }



   
   // set page title 
   $doc_title = "New Admin";
   
   // set white space title
   $page_title = "<b>New Administrator</b>";
    
     // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content); 


?>