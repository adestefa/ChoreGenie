<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
  
   $content =""; 
   $denomination = $_GET{'value'};
   
   print "V:$denomination<br />";
   $css = trim($p->css);
    $doc = <<<EOD
<html>
<head>
<title>Print ChorePoints</title>
<link type="text/css" rel="stylesheet" href="/styles/$css">
</head>
<body onload="self.focus();opener.history.go(0)"><center>
<table border="0" class="table-cp-sheet-1" cellspacing="0">
<tr><td colspan="3" align="center"><form><input type="button" value="print" onclick="window.print()" /></form></td></tr>
##ROWS##
</table>
</center>
</body>
</html> 
EOD;
   
   
   
   if(pastMintLimit($p->userID,$denomination)){
   	$content = "<tr><td colspan='3'><b>Sorry you reached your mint limit for this denomination. <br />You already have many unredeemed CP tickets created. <br />Have users redeem existing CP tickets first before making more.<br /><br /> If you want to print check your navigation bar</td></tr>";
      $page = str_replace("##ROWS##", $content, $doc);
       print $page;
    
    
     }else{
   	
   	$content .= "<br />Minting Chore point<br />";
   
    for($i=0;$i<10;$i++) { 
        $sid = "";
        $random = (rand()%100000);
        $sid = $PHPSESSID;
        $sid = strtoupper($sid) . $random;
        $sid = substr($sid, 25, 35);
        addChorePoint($denomination,$p->userID,$sid);
    }
 
  
    $out= "";
    $dbh = connect();
    $sql = "SELECT id, value, serial, dateCreated FROM chorePoint WHERE chorePoint.adminID = '$p->userID' AND value='$denomination' AND userID = 0";
  
    $result = @mysql_query($sql,$dbh) or die("could not execute query");
    $num = mysql_numrows($result);
    $total = $num * $denomination;
    print "I have $num of $denomination 's  for a total of $total ChorePoints<br />";
    
    
    
       $count = 1;
       $countTag = "##TICKET-REDEEMED-N##";
 
      while ($row = mysql_fetch_array($result))
        {
         $id = $row['id'];
         $value = $row['value'];
         $serial = $row['serial'];
         $datecreated = $row['dateCreated'];
         $cp1 = file($DOCUMENT_ROOT . "/templates/forms/cp.tmpl");
          $cp1 = str_replace("##IMG_STYLE##", getUserImgStyle($p->css), $cp1);
         $cp1 = str_replace("##ID##", $serial, $cp1);
         $cp1 = str_replace("##VALUE##", $denomination, $cp1);  
         $cp1 = str_replace("##DATE##", $datecreated, $cp1);
         $cp1 = str_replace("##ADMIN##", $p->userID, $cp1);     
         $cp1 = implode("", $cp1);
         
         $row = '<tr><td width="3"><b>'.$count.'</b></td><td align="left">'.$cp1.'</td></tr>';
         $content .= $row;
         $count++;
        }

       $page = str_replace("##ROWS##", $content, $doc);
       print $page;
     }
  
    
   
 ?>
  
  
  
