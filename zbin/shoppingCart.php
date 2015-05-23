<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
 
 
   
    $prizeID = $HTTP_POST_VARS{'prizeID'};
    
    if($prizeID != ""){
    	
    	print "PRIZE:$prizeID<br />";
    	
   $dbh = connect();
   $sql = "SELECT prize.id, prize.name, prize.moneyValue, prize.image, prize.url FROM prize WHERE prize.id = $prizeID";
   $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
   
    while ($row = mysql_fetch_array($result))
    {
   $prizename = $row['name'];
   $prizevalue  = $row['moneyValue'];
   $prizeimage = $row['image'];
   $prizeurl = $row['url'];
    }
   $chorepoints = dollarsToChorePoints($p->userID,$prizevalue);
   $userchorepoints = getBalance($p->userID);
   $userchorepointbalance = ($userchorepoints - $chorepoints);
     
   $content = "<br /><br />";
   $content .='<br /><hr class="cart-divider-main"></br />';
  
   $c = file($DOCUMENT_ROOT . "/templates/forms/shoppingcart.tmpl");
   $c = str_replace("##PRIZEID##", $prizeID, $c);
   $c = str_replace("##NAME##", $name, $c);
   $c = str_replace("##PRIZEIMAGE##", $prizeimage, $c);
   $c = str_replace("##PRIZEURL##", $prizeurl, $c);
   $c = str_replace("##CHOREPOINTS##", $chorepoints, $c);
   $c = str_replace("##USERCHOREPOINTS##", $userchorepoints, $c);
   $c = str_replace("##USERCHOREPOINTBALANCE##", $userchorepointbalance, $c); 
   $content .= implode("", $c); 
   
   
    }else{
    	
    $content = "prize not defined";
    }
 
 
     // set page title 
   $doc_title = "Shopping Cart";
   
   // set white space title
   $page_title = "<b>Shopping Cart</b>";
    
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);    
   
 ?>
  
  
  
