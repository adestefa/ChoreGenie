<?php

   // continue session
   session_start();
   
   // load include files
   require $DOCUMENT_ROOT . "/zbin/incs/main.inc";  
   
   // load profile object from session
   $p = unserialize($_SESSION['profile']);
   
  // define page content (chore list)
  // $content = Chores();
   
  
   
   $form = <<<EOT
  

<form name="printer">Ticket Value to print:<select name="value">
  <option value="1">1</option>
  <option value="5">5</option>
  <option value="10">10</option>
  <option value="20">20</option>
  <option value="50">50</option>
  </select>
  
<input type="button" value="Print ChorePoints" onclick="print_()" /></form>

<script>
function print_(){
	value = document.printer.value.options[document.printer.value.selectedIndex].value;
	var url = "http://choregenie.com/zbin/chorePointSheet.php?create=0&value="+value;
pop = window.open(url,"t","width=800,height=400,resizable,scrollbars")
}
</script>
EOT;
    
   $one    = findChorePointsSmall($p->userID,1); 
   $five   = findChorePointsSmall($p->userID,5); 
   $ten    = findChorePointsSmall($p->userID,10); 
   $twenty = findChorePointsSmall($p->userID,20); 
   $fifty  = findChorePointsSmall($p->userID,50); 
   

  $openCPvalue   = unredeemedCPValue($p->userID);
  $closedCPvalue = redeemedCPValue($p->userID);
  $closedBillCount = redeemedBills($p->userID);
  $openBillCount = unredeemedBills($p->userID);
  
  $page = <<<EOD
   <table border="0">
   <tr><td align="left" valign="top"><br /><br /><table border="0" width="255"><tr><td align="center">$form</td></tr></table></td><td width="10">&nbsp;</td><td align="right" valign="top"><table><tr><td colspan="4" align="center"><u>Totals</u>:</td></tr><tr><td>redeemed Bills:</td><td><b>$closedBillCount</b></td><td>(value)</td><td><b>$closedCPvalue</b></td></tr><tr><td>unredeemed Bills:</td><td><b>$openBillCount</b></td><td>(value)</td><td><b>$openCPvalue</b></td></tr></table></td></tr>
   </table>
EOD;


   
   $content = $page;
   
    
   
      
   // set page title 
   $doc_title = "ChorePoint Printer";
   
   // set white space title
   $page_title = "<b>ChorePoint Printer</b>";
    
   // build page by combining data and send to client
   sendPage($doc_title,$page_title,$content);  
            
   
 ?>
  
  
  
