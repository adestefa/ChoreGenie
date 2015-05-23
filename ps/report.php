<?php
    
  print "<html>
         <head>
         <title>PS CCE Developer Coverage Manager</title>
         <style>
         .header { background-color:#c0c0c0; color:#000000; font-weight:bold; }
         </style>
         </head>
         <body>
         
         ";
         
  print "Starting....<br />";
  schedule();
  $content = sch_report();
  $content .= dev_report();
  print "$content";









function schedule(){

 $t = stamp("time");
 $d = stamp("date");
 $s = stamp();
 findWeek();

}


function findWeek() {

$day = date(j);
$month = date(m);
$year = date(Y);
$today_wkday = date(w);

for ($d = 6; $d >= 0; $d--) {
 $wkday = date(w, strtotime("-$d days"));
 $day = date(l, strtotime("-$d days"));
  if($wkday != 0 && $wkday != 6) {
    $opt_date = date("m/d/y", strtotime("-$d days")); 
    echo "$day $opt_date<br />\n";
  } 
 
  } 

}


function report() {  
  
  $dbh = connect();

  $sql = "SELECT *
         FROM user WHERE 1";
   
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  
  // - check return
  if($num != 0){
  //echo "<b> $num entries found!</b><br /><br />";
   $out = "";
   $out = '<table class="choretable" width="500" cellpadding="0" cellspacing="0">';
   $out .= "<tr class='header'>
                <td>ID:</td>
                <td>First Name:</td>
                <td>Last Name:</td>
                <td>Email:</td>
                <td>User Name:</td>
                
            </tr>";
 
  
   while ($row = mysql_fetch_array($result))
    {
     $id = $row['id'];
     $first = $row['firstname'];
     $last = $row['lastname'];
     $email = $row['email'];
     $usrname = $row['username'];
     
     $out .= "<tr>
                <td>$id</td>
                <td>$first</td>
                <td>$last</td>
                <td>$email</td>
                <td>$usrname</td>
              </tr>";
     } 
    $out .= "</table>";    
     
     $out .= "</ul></td></tr></table>";
        
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 








function dev_report() {  
  
  $dbh = connect();

  $sql = "SELECT *
         FROM user WHERE 1";
   
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  
  // - check return
  if($num != 0){
  //echo "<b> $num entries found!</b><br /><br />";
   $out = "";
   $out = '<table class="choretable" width="500" cellpadding="0" cellspacing="0">';
   $out .= "<tr class='header'>
                <td>ID:</td>
                <td>First Name:</td>
                <td>Last Name:</td>
                <td>Email:</td>
                <td>User Name:</td>
                <td>Type:</td>
                
            </tr>";
 
  
   while ($row = mysql_fetch_array($result))
    {
     $id = $row['id'];
     $first = $row['firstname'];
     $last = $row['lastname'];
     $email = $row['email'];
     $usrname = $row['username'];
     $type = $row['type'];
     
     $out .= "<tr>
                <td>$id</td>
                <td>$first</td>
                <td>$last</td>
                <td>$email</td>
                <td>$usrname</td>
                <td>$type</td>
              </tr>";
     } 
    $out .= "</table>";    
     
     $out .= "</ul></td></tr></table>";
        
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 






function sch_report() {  
  
  $dbh = connect();

  $sql = "SELECT *
         FROM schedule WHERE 1";
   
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  
  // - check return
  if($num != 0){
  //echo "<b> $num entries found!</b><br /><br />";
   $out = "";
   $out = '<table class="choretable" width="500" cellpadding="0" cellspacing="0">';
   $out .= "<tr class='header'>
                <td>ID:</td>
                <td>Day:</td>
                <td>Start Time:</td>
                <td>End Time:</td>
                <td>Developer:</td>
                <td>Commitment date:</td>
              </tr>";
 
  
   while ($row = mysql_fetch_array($result))
    {
     $id = $row['id'];
     $day = $row['day'];
     $starttime = $row['starttime'];
     $endtime = $row['endtime'];
     $dev = $row['developer'];
     $datecommited = $row['datecommited'];
     
     $out .= "<tr>
                <td>$id</td>
                <td>$day</td>
                <td>$starttime</td>
                <td>$endtime</td>
                <td>$dev</td>
                <td>$datecommited</td>
              </tr>";
     } 
    $out .= "</table>";    
     
     $out .= "</ul></td></tr></table>";
        
    }
    else {
    $out .=  "No records found!";
    }
 return $out;   
} 


function stamp($type="stamp"){

 $ante = date(a);
 $dayWeek = date(w);
 $dayWrd = date(D);   

 $day = date(j);
 $month = date(m);
 $year = date(Y);
 
 $h = date(h);
 $m = date(i);
 $s = date(s);
 $h = ($h + 3); # server is hosted in PDT add 3 hours for EST


 $date = "$month-$day-$year";
 $stamp = "$month-$day-$year $h:$m:$s";
 $time = "$h:$m:$s";
 
 if($type == "date") {
   return $date;
 }else if($type == "time") {
   return $time;
 }else if($type == "stamp") {
   return $stamp;
 }
 
}



function connect(){
$db_user = "choreg36_web";
$db_pass = "nippur";
$db_name = "choreg36_elbow";
$dbh=mysql_connect ("localhost", $db_user, $db_pass) or die ('I cannot connect to the database because: ' . mysql_error());
 mysql_select_db ($db_name);
 return ($dbh);
}  


?>