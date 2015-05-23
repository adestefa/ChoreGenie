<?php

  // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
    // define page content (chore list)
    //$content = $p->form();
    
    $styleID = $_POST['styleID'];	
   
    
    if(isset($styleID)){
    	setStyle($p->userID,$styleID);
       	
        $p2 = new profile;
        $p2->css = getStyleCSS($styleID);
        $p2->template = $p->template;
        $p2->userID = $p->userID;
        $p2->name = $p->name;
        $p2->admin = $p->admin;
        $p2->typeID = $p->typeID;
        $_SESSION['profile'] = serialize($p2);
        $p = unserialize($_SESSION['profile']);
    }else{
    	$styleID = getStyleID($p->css);
    }	
    
   
//    $selectField = select_STYLE($styleID);
//   $content = <<<EOD
//    <form action="/zbin/settings.php" method="post">
//    <table>
//    <tr><td>Style</td><td>$selectField</td></tr>
//    <tr><td colspan="2"><input type="submit" value="Change Style" /></td></tr>
//    </table>
//    </form>
//EOD;






 $imgStyle = getUserImgStyle($p->css);
   
   $dbh = connect();
   $sql = "SELECT id, name, description, image, author, rating, date FROM style"; 
   $result = @mysql_query($sql,$dbh) or die("could not execute style query");
   $form = '<br /><br /><form name="style" action="/zbin/settings.php" method="post"><table border="0">';
   $count = 0;
   
   
   while ($row = mysql_fetch_array($result))
    {
      $id = $row['id'];
      $name = $row['name'];
      $desc = $row['description'];
      $image = $row['image'];
      $author = $row['author'];
      $date = $row['date'];
      $rating = $row['rating'];
  
  if($id == $styleID){
  	$form .= '<tr><td align="left"><input type="radio" name="styleID" value="'.$id.'" CHECKED/><b><a name="'.$name.'">'.$name.'</a></b></td></tr>';
  }else{
   $form .= '<tr><td align="left"><input type="radio" name="styleID" value="'.$id.'" onclick="document.style.submit()"/><b><a name="'.$name.'">'.$name.'</a></b></td></tr>';
  }
  
  
  
$form .= <<<EOD
   
   <tr><td align="center" valign="top">
   <table border="0" cellpadding="3"><tr><td align="center" valign="middle"><table border="0">
      <tr><td align="right"><b>Description:</b></td><td>$desc</td></tr>
      <tr><td align="right"><b>Author:</b></td><td>$author</td></tr>
   <tr><td align="right"><b>Date:</b></td><td>$date</td></tr>
      <tr><td colspan="2" align="left"><img src="../imgs/$name/thumbnail.jpg" alt="$name" width="336" /></td></tr>
   </table></td></tr></table>
   </td></tr>
   <tr><td>&nbsp;</td></tr>
EOD;
 $count++;
    }
  
  $form .= <<<EOD
  <tr>
  <td colspan="2" align="right"><input type="submit" value="Change Style" /></td>
  </tr>
  </table>
  </form>
EOD;



 $content = $form;

       
       
   // set page title 
   $doc_title = "Settings";
   
   // set white space title
   $page_title = "<b>Settings</b>";
   
    // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);      
?>