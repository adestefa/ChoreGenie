<?
// load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   
   function getHits($page){
   $dbh = connect();
   $sql = "SELECT count from hits where page = '$page'";
   $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute exchagne rate query</span>");
   $row = mysql_fetch_array($result);
   $count = $row['count'];
   return $count;
   
   }

 
 function  pageHit($page){
   $hits = getHits($page);
   $hits++;
   $domain = GetHostByName($REMOTE_ADDR); 
   $dbh = connect();
   $sql = "UPDATE `hits` SET `count` = '$hits' WHERE `page` = '$page'";   
   $result = mysql_query($sql,$dbh) or die("<span style='color:#000000'>could not execute pageHit()</span>");
   return $hits;
 } 
 
 
?>
<bgsound src="http://choregenie.com/guitar.wav" />



<br /><br />
<center><img src="/guitar/1.jpg" /></center>

<br />
<?
 $hits = pageHit("guitar");
 print "HITS:$hits :<br />";
?>