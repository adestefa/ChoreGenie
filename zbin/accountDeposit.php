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
   $serialU = $HTTP_POST_VARS{'serial'};
   $adminU = $HTTP_POST_VARS{'admin'}; 
   $valueU = $HTTP_POST_VARS{'value'};
   $dateU = $HTTP_POST_VARS{'date'};
   
   $dbh = connect();
   $sql = "SELECT chorePoint.id, chorePoint.serial, chorePoint.adminID, chorePoint.value, chorePoint.dateCreated, chorePoint.dateExchanged, chorePoint.userID from `chorePoint` WHERE chorePoint.serial = '$serialU'"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute query");
   $num = mysql_numrows($result);
  // - Valid Un-redeemed chore point
  if($num != 0){
   
    // extract chore point record
     while ($row = mysql_fetch_array($result))
     {
        $cpID = $row['id'];
        $serialdb = $row['serial'];
        $admindb = $row['adminID'];
        $valuedb = $row['value'];
        $datedb = $row['dateCreated'];
        $dateExchanged = $row['dateExchanged'];
        $userID = $row['userID'];
     } 
 
    
     # validate chorePoint data 
     if(($serialdb == $serialU)&& ($admindb == $adminU) && ($valuedb == $valueU) && ($datedb == $dateU)){
 	   
 	   # validate not exchnaged already
 	   if($dateExchanged == 0000-00-00){
 	       $sql = "SELECT balance FROM `account` WHERE account.userID = $p->userID"; 
           $result2 = @mysql_query($sql,$dbh) or die("could not execute query");
           while ($row = mysql_fetch_array($result2))
           {
           $balance = $row['balance'];
           } 
     
           $balance = $balance + $valuedb; 
           deposit($p->userID,$balance);
     
           $date = Date("Y-m-d");
           $sql = "UPDATE `chorePoint` SET `userID`='$p->userID', `dateExchanged`='$date' WHERE chorePoint.id = $cpID"; 
           $result4 = @mysql_query($sql,$dbh) or die("could not execute query");
     
           $content = "<br />$valuedb Chore point(s) have been added to your account<br />";
           $content .= "New balance:<span class='balance'>$balance</span><br />";
 
           $c = file($DOCUMENT_ROOT . "/templates/forms/redeem.tmpl");
           $c = str_replace("##SERIAL##", "", $c);
           $c = str_replace("##ADMIN##", "", $c);
           $c = str_replace("##VALUE##", "", $c);
           $c = str_replace("##DATE##", "", $c); 
           $content .= '<br /><hr class="divider" /><br />';
           $content .= implode("", $c); 


     # already exchanged
     }else {
       if($p->userID == $userID){
              $content = "<div class='error-already-redeem'>You already redeemed this Chore Point on $dateExchanged.</div><br />";
       }else{
       	      $content = "<div class='error-illegal-redemption'>Illegal attempt to redeem a deposited Chore Point.<br /><br />BEWARE Counterfeit redemtion attempts are tracked, this has been logged!</div><br />";
              logAction($p->userID,"illegal redemption attempt");
       } 	
 	 }

 
 
        # other data does not match
        }else{
        $content = "Invalid data please try again, .";
        $c = file($DOCUMENT_ROOT . "/templates/forms/redeem.tmpl");
        $c = str_replace("##SERIAL##", $serialU, $c);
        $c = str_replace("##ADMIN##", $adminU, $c);
        $c = str_replace("##VALUE##", $valueU, $c);
        $c = str_replace("##DATE##", $dateU, $c); 
        $content .= '<br /><hr class="divider" /><br />';
        $content .= implode("", $c); 
        }





   # if serial not found
   }else {
  	  $content = "Sorry please try again, the serial number you entered was not found.<br />";
      $c = file($DOCUMENT_ROOT . "/templates/forms/redeem.tmpl");
      $c = str_replace("##SERIAL##", $serialU, $c);
      $c = str_replace("##ADMIN##", $adminU, $c);
      $c = str_replace("##VALUE##", $valueU, $c);
      $c = str_replace("##DATE##", $dateU, $c); 
      $content .= '<br /><hr class="divider" /><br />';
      $content .= implode("", $c); 
  }
    
    
   
  
      
   // set page title 
   $doc_title = "Make a deposit";
   
   // set white space title
   $page_title = "<b>Make a deposit</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
       



?>