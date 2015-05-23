<?php


function scheduleReport() {  
  
  $dbh = connect();

  $sql = "SELECT *
         FROM schedule WHERE 1";
   
  $result = mysql_query($sql,$dbh) or die("<span style='color:#ffffff'>could not execute query</span>");
  $num = mysql_numrows($result);
  
  // - check return
  if($num != 0){
  //echo "<b> $num entries found!</b><br /><br />";

   $out = '<table class="choretable" width="250" cellpadding="0" cellspacing="0">';
   $out .= "<tr>
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


?>