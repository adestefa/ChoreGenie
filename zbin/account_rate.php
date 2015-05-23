<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
   
  
 
   
   $newRate = $HTTP_POST_VARS{'newRate'};
   $postedID = $HTTP_POST_VARS{'postedID'};
   
   
    if($postedID != "" && $newRate != ""){
     setExchangeRate($postedID,$newRate);
    }
   
   
   
   $dbh = connect();
   $sql = "SELECT user.id, user.name, user.username, account.exchangeRate FROM user, account WHERE user.id = account.userID"; 
   $result1 = @mysql_query($sql,$dbh) or die("could not execute query");
 
    $content = "<table>";  
   
   while ($row = mysql_fetch_array($result1))
    {
      $userID = $row['id'];
      $action = $row['action'];
      $timestamp = $row['timestamp'];
      $name = $row['name'];
      $username = $row['username'];
      $rate = $row['exchangeRate'];
      
      if($userID == $postedID){
      
      $content .= '<tr><td bgcolor="c0c0c0" align="right"><form action="/zbin/account_rate.php" method="post"><input type="hidden" name="postedID" value="'.$userID.'">'.$username.' '.$name.' '.$userID.'</td><td><input type="text" size="10" name="newRate" value="'.$rate.'" /><input type="submit" value="update" /></form></td></tr>';
      
      }else{
        $content .= '<tr><td align="right"><form action="/zbin/account_rate.php" method="post"><input type="hidden" name="postedID" value="'.$userID.'">'.$username.' '.$name.' '.$userID.'</td><td><input type="text" size="10" name="newRate" value="'.$rate.'" /><input type="submit" value="update" /></form></td></tr>';
   
      }
       
   
   }
    $content .= "</td></tr></table>";
      
   
       
       
      
   // set page title 
   $doc_title = "Account - Exchange Rate";
   
   // set white space title
   $page_title = "<b>Exchange Rate</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
            
   
 ?>
  
  
  
