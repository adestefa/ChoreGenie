<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
  // $content = Chores();
   
   $sheetValue = $_GET{'value'};
 
    
$doc = <<<EOD
<html>
<head>
<title>Print ChorePoints</title>
<link type="text/css" rel="stylesheet" href="/styles/$p->css">
</head>
<body onload="self.focus()"><center>
<table border="0" class="table-cp-sheet-1" cellspacing="0">
<tr><td colspan="3" align="center"><form><input type="button" value="print" onclick="window.print()" /></form></td></tr>
##ROWS##
</table>
</center>
</body>
</html> 
EOD;


   
   
$content ="";  
$out= "";
$dbh = connect();
$sql = "SELECT id, value, serial, dateCreated
        FROM chorePoint 
        WHERE chorePoint.adminID = '$p->userID' AND value='$sheetValue' AND userID = 0";
  
$result = @mysql_query($sql,$dbh) or die("could not execute query");
$num = mysql_numrows($result);
if($num != 0) {
 $count = 1;
 while ($row = mysql_fetch_array($result))
    {
     $id = $row['id'];
     $value = $row['value'];
     $serial = $row['serial'];
     $datecreated = $row['dateCreated'];
      $cp1 = file($DOCUMENT_ROOT . "/templates/forms/cp.tmpl");
     $cp1 = str_replace("##IMG_STYLE##", getUserImgStyle($p->css), $cp1);
     $cp1 = str_replace("##ID##", $serial, $cp1);
     $cp1 = str_replace("##VALUE##", $value, $cp1);  
     $cp1 = str_replace("##DATE##", $datecreated, $cp1);
     $cp1 = str_replace("##ADMIN##", $p->userID, $cp1);     
     $cp1 = implode("", $cp1);
     
     $row = '<tr><td><b>'.$count.'</b></td><td align="center">'.$cp1.'</td></tr>';
  
     
     $content .= $row;
     $count++;
    }


   $page = str_replace("##ROWS##", $content, $doc);
  print $page;
}else {


   print "<table class='table-user-create'><tr><td>There are no ChorePoint tickets with the value of $value under your account.</td></tr></table><br />";

  


}
   
  
 
    
  
   
 ?>
  
  
  
