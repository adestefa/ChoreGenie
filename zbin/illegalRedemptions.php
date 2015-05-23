<?

 // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
   // define page content
   #$content = $p->report();
   
   $id;
   $postedID = $HTTP_POST_VARS{'postedID'};
   
   $dbh = connect();
   $sql = "SELECT user.id, user.name, user.username FROM user WHERE user.id IS NOT NULL"; 
   $result1 = @mysql_query($sql,$dbh) or die("could not execute query");
   $content = "<form action='/zbin/illegalRedemptions.php' method='post'>";
   $content .= "<table class='user-list'><tr><td>Pick a user:<td><td><select name='postedID'>";
   
   while ($row = mysql_fetch_array($result1))
    {
      $userID = $row['id'];
      $action = $row['action'];
      $timestamp = $row['timestamp'];
      $name = $row['name'];
      $username = $row['username'];
      
      if($userID == $postedID){
      $content .= "<option value='$userID' selected='selected'>$username $name $userID</option>";
      }else{
      $content .= "<option value='$userID'>$username $name $userID</option>";
      }
    }
    $content .="</select></td><td><input type='submit' value='go' /></td></tr></table></form>";
      
   
   if($postedID != ""){
   
   $dbh = connect();
   $sql = "SELECT log.userID, log.action, log.timestamp FROM log WHERE log.userID = $postedID"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   $num = mysql_numrows($result);
 
   if($num != 0){
  
  $content .= "<table class='illegal-report'><tr><th>timestamp</th><th>Action</th></tr>";
  while ($row = mysql_fetch_array($result))
    {
      $userID = $row['userID'];
      $action = $row['action'];
      $timestamp = $row['timestamp'];
      $content .= "<tr><td>$timestamp</td><td>$action</td></tr>";
    }
    $content .="</table>";
 
   
   }else{
   	$content .= "<div class='msg'>No log entries found for this user.</div><br />";
   }

   }
     // set page title 
   $doc_title = "Illegal Redemption Report";
   
   // set white space title
   $page_title = "<b>Illegal Redemption Report</b>";
    
    
   // build page by combining data and send to client
 sendPage($doc_title,$page_title,$content);  
  



?>