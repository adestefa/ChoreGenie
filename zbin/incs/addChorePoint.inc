<?php

/*
 *
 * build sidebar list of chores showing name and price
 *
 *
 *
 */


function addChorePoint($value,$adminid,$serial) {  
  
  $dbh = connect();
  $date = Date("Y-m-d");
   $sql = "INSERT into chorePoint
       (dateCreated, adminID, value, userID, serial)
       VALUES
       ('$date','$adminid','$value','','$serial')";
         
   
  $result = @mysql_query($sql,$dbh) or die("could not execute query");
  
  return $result;
}


function findOpenChorePointTotal($adminID){
$dbh = connect();
$sql = "SELECT value FROM chorePoint WHERE adminID = '$adminID' AND userID = 0";
$result = @mysql_query($sql,$dbh) or die("could not execute Open CP Total amount query");
$num = mysql_numrows($result);	
$total = 0;
  if($num != 0) {
    while ($row = mysql_fetch_array($result)) {
     $value = $row['value'];
     $total .= $value;
    }
  }
 return $total;   
}

function findClosedChorePointTotal($adminID){
$dbh = connect();
$sql = "SELECT value FROM chorePoint WHERE chorePoint.adminID = '$adminID' AND userID > 0";
$result = @mysql_query($sql,$dbh) or die("could not execute Open CP Total amount query");
$num = mysql_numrows($result);	
$total = 0;
  if($num != 0) {
    while ($row = mysql_fetch_array($result)) {
     $value = $row['value'];
     $total = ($total + $value);
    }
  }
 return $total;   
}


function findChorePoints($adminID,$denomination) {
$out= "";
$dbh = connect();
$sql = "SELECT id, value, serial, userID, dateExchanged FROM chorePoint WHERE chorePoint.adminID = '$adminID' AND value = '$denomination'";
  
$result = @mysql_query($sql,$dbh) or die("could not execute query");
$num = mysql_numrows($result);
print "NUM:$num<br />";
   if($num != 0) {
   	$count = 1;
	  $p = unserialize($_SESSION['profile']);
     $imgStyle = getUserImgStyle($p->css);
     $out .= '<table border="0" width="350">';
     $out .= '<tr><td align="center"><b>'.$denomination.'</b>\'s<img src="../imgs/Blue/spacer.gif" width="120" height="1" />';
     $out .= '<u>Total value:<span class="serial">##TOTAL##</span></u>';
     $out .= '<table border="0">';
     $out .= '<tr><td colspan="3"><img src="../imgs/'.$imgStyle.'/chorePoint_'.$denomination.'.gif" width="220" /></td></tr>';
 
 
 while ($row = mysql_fetch_array($result)) {
     $serial = $row['serial'];
     $date = $row['dateExchanged'];
     $userID = $row['userID'];
     $userName = getUserName($userID);
     
     $out .= '<tr><td>'.$count.'</td><td><span class="serial">';
       
      if($userID > 0){
 
      	          $out .= "<strike>" . $serial . '</strike></span></td><td><span style="font-size:10px">' . "<b><a href='#' title='$date' style='color:#000000'>$userName</a></b>";
      }else{
             	  $out .= $serial . '</span></td><td><span style="font-size:10px">open';
      }
     		
      $out .= '</span></td></tr>';
     $count++;
     }
    $out .= '</table>';
    $out .= '</td></tr></table><br />';
    $total = (($count*$denomination)-$denomination);
    $out = str_replace("##TOTAL##", $total, $out);

return $out;
}else {
 return "<table width='200'><tr><td>($denomination) denomination tickets have not been created</td></tr></table>";
}
       
}




function findChorePointsSmall($adminID,$denomination) {
 $out= "";
 $dbh = connect();
 $sql = "SELECT id, value, serial, userID, dateExchanged FROM chorePoint WHERE chorePoint.adminID = '$adminID' AND value = '$denomination'";
 $result = @mysql_query($sql,$dbh) or die("could not execute query");
 $num = mysql_numrows($result);
 if($num != 0) {
    $total = (($num*$denomination));
    $lim = pastMintLimit($adminID,$denomination);
    if($lim){
      $out =  "Reached Limit of ($num) value:<b>$total</b>.<br /><center><span font='color:#FFFF00'>Redeem tickets to create more</span></center>";
    }else{
      $out =  "you have ($num) value of:<b>$total</b>.";
    }
    return $out;
 }else {
    return "<table width='200'><tr><td>tickets have not been created</td></tr></table>";
 }
}

function unredeemedCPValue($adminID) {
 $out= "";
 $dbh = connect();
 $sql = "SELECT value, userID FROM chorePoint WHERE chorePoint.adminID = '$adminID' AND userID = 0";
 $result = @mysql_query($sql,$dbh) or die("could not execute query");
 $num = mysql_numrows($result);
 $total = 0;
 while ($row = mysql_fetch_array($result)) {
     $value = $row['value'];
     $total = $total + $value;
 }    
  return $total;
}

function redeemedCPValue($adminID) {
 $out= "";
 $dbh = connect();
 $sql = "SELECT value, userID FROM chorePoint WHERE userID NOT LIKE 0 AND adminID = '$adminID'";
 $result = @mysql_query($sql,$dbh) or die("could not execute redeemedCPValue query");
 $num = mysql_numrows($result);
 $total = 0;
 while ($row = mysql_fetch_array($result)) {
     $value = $row['value'];
     $total = $total + $value;
 }    
  return $total;
}

function redeemedBills($adminID) {
 $out= "";
 $dbh = connect();
 $sql = "SELECT value, userID FROM chorePoint WHERE userID NOT LIKE 0 AND adminID = '$adminID'";
 $result = @mysql_query($sql,$dbh) or die("could not execute query");
 $num = mysql_numrows($result);
 return $num;
}

function unredeemedBills($adminID) {
 $out= "";
 $dbh = connect();
 $sql = "SELECT value, userID FROM chorePoint WHERE chorePoint.adminID = '$adminID' AND userID = 0";
 $result = @mysql_query($sql,$dbh) or die("could not execute query");
 $num = mysql_numrows($result);
 return $num;
}
function pastMintLimit($userID,$denomination){
      $billMintLimit[1] = "40";
      $billMintLimit[5] = "40";
      $billMintLimit[10] = "20";
      $billMintLimit[20] = "20";
      $billMintLimit[50] = "20";
      
      $dbh = connect();
      $sql = "SELECT id FROM chorePoint WHERE adminID = '$userID' AND value = '$denomination' AND userID = 0";
      $result = @mysql_query($sql,$dbh) or die("could not execute pastLimit query");
      $n = mysql_numrows($result);
       if($n >= $billMintLimit[$denomination]){
      	return true;
      }else{
     return false;
      	
      }
}      




?>