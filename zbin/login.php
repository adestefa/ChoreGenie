<?php

/*


*/
  session_start(); 
  ob_start();
  
  include_once $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
 

  $user = $HTTP_POST_VARS{'user'};
  $pass = $HTTP_POST_VARS{'pass'};


function login(){

 // - display form if user has not logged in yet
 if(($user == "") && ($pass == "")){

  header("Location: http://choregenie.com/index.html");


 } // - validate user if both user and pass are provided
  elseif(($user != "") && ($pass != ""))
 {

  $dbh = connect();

  $sql = "SELECT user.id, user.username, user.admin, user.typeID, style.css, style.template
         FROM style, user
         WHERE user.username = \"$user\"
         AND  user.password = \"$pass\"   
         AND style.id = user.style";
   #password(\"$pass\")
  
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);


  // - Valid user
  if($num != 0){
  //echo "<b> you're authorized!</b><br /><br />";

   while ($row = mysql_fetch_array($result))
    {
     $css      = $row['css'];
     $template = $row['template'];
     $userId   = $row['id'];
     $name     = $row['username'];
     $admin    = $row['admin'];
     $typeID   = $row['typeID'];
    }
  
  $p = new profile;
  $p->css = $css;
  $p->template = $template;
  $p->userID = $userId;
  $p->name = $name;
  $p->admin = $admin;
  $p->typeID = $typeID;
  
  session_register('profile');
  $_SESSION['profile'] = serialize($p);
  
  
  #header("Location: http://choregenie.com/zbin/home.php");
  #exit;
  
  
  
   }
   else
   {
   # header("Location: http://choregenie.com/index.html");
    
     } // end valid user

 } // end user pass

}


   // load form template file
      $c = file($DOCUMENT_ROOT . "../templates/forms/login.html");
           
      // insert data into form template
      $c = str_replace("##ERR-MSG##",             "", $c);
      $c = str_replace("##CNTRY-OPTIONS##",       cntryOptions($p->cntry), $c);
      $c = str_replace("##LANG-OPTIONS##",        langOptions($p->lang), $c);
      $c = str_replace("##LINK-URL##",            $_POST['url'], $c);
      $c = str_replace("##LINK-TEXT##",           $_POST['link'], $c);
      $content .= implode("", $c); 
 
  // set page title 
   $doc_title = "Login";
   
   // set white space title
   $page_title = "<b>Login</b>";
    
 // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  

 ob_end_flush(); 


 ?>