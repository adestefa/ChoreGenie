<?php
class profile
{
   var $css;
   var $template;
   var $name;
   var $userID;
   var $admin;
   var $typeID;
   
   
   function profile() {
   }
   
  
  
   function report() {
      
   // set content (white space)
   $content = '<table border="0" cellpadding="0" cellspacing="0" >';
   $content .= $tr . '<td colspan="2" align="center">Profile</td></tr>';
   $content .= $tr . '<td>CSS Style</td><td><b>' . $this->css . '</b></td></tr>';
   $content .= $tr . '<td>Template</td><td><b>' . $this->template . '</b></td></tr>';
 //  $content .= $tr . '<td>Name</td><td><b>' . $this->name . '</b></td></tr>';
  // $content .= $tr . '<td>userID</td><td><b>' . $this->userID . '</b></td></tr>';
  // $content .= $tr . '<td>Admin</td><td><b>' . $this->admin . '</b></td></tr>';
  //  $content .= $tr . '<td>TypeID</td><td><b>' . $this->typeID . '</b></td></tr>';
   $content .= '</table>';
   return $content;
   }
   
   
  function form() {
   
   
   // set content (white space)
    if(!isSet($this->css)) { 
    $this->css = "0";
    }
    
    if(!isSet($this->template)) { 
    $this->template = "default.tmpl";
    }
    
    if(!isSet($this->name)) {
    $this->name = "unknown";
    }
 
    if(!isSet($this->userID)) {
    $this->userID = "unknown";
    }
    
    if(!isSet($this->admin)) {
    $this->admin = "0";
    }
   
     if(!isSet($this->typeID)) {
    $this->typeID = "unknown";
    }
    
   $content = '<form action="/zbin/saveSettings.php" method="post">'; 
   $content .= '<table border="0" cellpadding="0" cellspacing="0" class="profile">';
   $content .= '<tr><td colspan="2" align="center">Profile</td></tr>';
   $content .= '<tr><td>CSS Style</td><td><input size="50" type="text" name="css_" value="' .$this->css . '" /></td></tr>';
   $content .= '<tr><td>Template</td><td><input  size="50" type="text" name="template_" value="' . $this->template . '" /></td></tr>';
   $content .= '<tr><td colspan="2"><input type="submit" value="Submit" /></td></tr>';
   $content .= '</table>';
   return $content;
   }
  


  

}
?>