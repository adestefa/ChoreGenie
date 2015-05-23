<?php
class prize
{
   var $id;
   var $authorID;
   var $dateCreated;
   var $name;
   var $description;
   var $moneyValue;
   var $image;
   var $url;
   
   function prize() {
   }
   
  
  
   function report() {
   // set content (white space)
   $content = '<table border="0" cellpadding="0" cellspacing="0" class="profile">';
   $content .= $tr . '<td colspan="2" align="center">Profile</td></tr>';
   $content .= $tr . '<td>CSS Style</td><td><b>' . $this->css . '</b></td></tr>';
   $content .= $tr . '<td>Template</td><td><b>' . $this->template . '</b></td></tr>';
   $content .= $tr . '<td>Name</td><td><b>' . $this->name . '</b></td></tr>';
   $content .= $tr . '<td>userID</td><td><b>' . $this->userID . '</b></td></tr>';
   $content .= $tr . '<td>Admin</td><td><b>' . $this->admin . '</b></td></tr>';
   $content .= '</table>';
   return $content;
   }
   
   
  function form() {
   $content = '<table border="0" cellpadding="0" cellspacing="0" class="profile">';
   $content .= $tr . '<td colspan="2" align="center">Profile</td></tr>';
   $content .= $tr . '<td>CSS Style</td><td><input size="50" type="text" name="css_" value="' .$this->css . '" /></td></tr>';
   $content .= $tr . '<td>Template</td><td><input  size="50" type="text" name="template_" value="' . $this->template . '" /></td></tr>';
   $content .= $tr . '<td>Name</td><td><input  size="50" type="text" name="name_" value="' . $this->name . '" /></b></td></tr>';
   $content .= $tr . '<td>userID</td><td><input  size="50" type="text" name="userId_" value="' . $this->userID . '" /></td></tr>';
   $content .= $tr . '<td>Admin</td><td><input  size="50" type="text" name="admin_" value="' . $this->admin . '" /></td></tr>';
   $content .= '</table>';
   return $content;
   }
  


  

}
?>