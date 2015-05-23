<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
  // $content = Chores();
   
  $imgStyle = getUserImgStyle($p->css);
  
  $one    = findChorePointsSmall($p->userID,1); 
  $five   = findChorePointsSmall($p->userID,5); 
  $ten    = findChorePointsSmall($p->userID,10); 
  $twenty = findChorePointsSmall($p->userID,20); 
  $fifty  = findChorePointsSmall($p->userID,50); 
  
  $openCPvalue = unredeemedCPValue($p->userID);
  $closedCPvalue = redeemedCPValue($p->userID);  
   
   $form = <<<EOT
  <form name="ticket">
  <table>
  <tr>
   <td><b>1</b></td>
   <td><input type="radio" name="dem" value="1" /></td>
   <td><img src="../imgs/$imgStyle/chorePoint_1.gif" alt="ChorePoint (1)" width="150" /></td>
   <td>$one</td>
  </tr>
  <tr>
  <td><b>5</b></td>
   <td><input type="radio" name="dem" value="5" /></td>
   <td><img src="../imgs/$imgStyle/chorePoint_5.gif" alt="ChorePoint (5)" width="150" /></td>
    <td>$five</td>
  </tr>
  <tr>
  <td><b>10</b></td>
   <td><input type="radio" name="dem" value="10" /></td>
   <td><img src="../imgs/$imgStyle/chorePoint_10.gif" alt="ChorePoint (10)" width="150" /></td>
   <td>$ten</td>
  </tr>
  <tr>
  <td><b>20</b></td>
   <td><input type="radio" name="dem" value="20" /></td>
   <td><img src="../imgs/$imgStyle/chorePoint_20.gif" alt="ChorePoint (20)" width="150" /></td>
   <td>$twenty</td>
  </tr>
  <tr>
  <td><b>50</b></td>
   <td><input type="radio" name="dem" value="50" /></td>
   <td><img src="../imgs/$imgStyle/chorePoint_50.gif" alt="ChorePoint (50)" width="150" /></td>
   <td>$fifty</td>
  </tr>
  <tr>
  <td colspan="3" align="right"><input type="button" value="Create ChorePoint Tickets" onclick="mint()" /></td>
  </tr>
  </table>
  </form>
 <script>
 // open popup window with minted chores for printing
 function mint(){
	var url = "http://choregenie.com/zbin/chorePointCreator.php?value=";
	for(i=0;i<document.ticket.dem.length;i++){
	     if(document.ticket.dem[i].checked){
			url+=document.ticket.dem[i].value;break;}}
	       pop = window.open(url,"t","width=800,height=400,resizable,scrollbars");
 }
</script>
EOT;
   
  
 
   
   
   $page = <<<EOD
   <table border="0">
   <tr><td align="left" valign="top"><br /><br /><table border="0" width="455"><tr><td align="center">$form</td></tr></table></td><td width="10">&nbsp;</td><td align="right" valign="top"><table><tr><td colspan="2" align="center"><u>Totals</u>:</td></tr><tr><td>redeemed:</td><td><b>$closedCPvalue</b></td></tr><tr><td>unredeemed:</td><td><b>$openCPvalue</b></td></tr></table></td></tr>
   </table>
EOD;

   
   $content = $page;
   
   
   // set page title 
   $doc_title = "ChorePoint Mint";
   
   // set white space title
   $page_title = "<b>ChorePoint Ticket Mint</b>";
    
  // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
             
   
 ?>
  
  
  
