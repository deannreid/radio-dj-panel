<?php require('head.php');?>

<center>


<b><u>Edit DJ Message</u></b><p>

<b>Note:</b> HTML is not allowed, and page must be refreshed for changes to take effect.

<?php
$file = "djmessage_edit.php";
if (!isset($_POST['submit']))
{
  $fo = fopen($file, "r");
  $fr = fread($fo, filesize($file));
  if ( get_magic_quotes_gpc () ) $fr = stripslashes($fr);
  
  $fr = str_replace("&", "&amp;", $fr);
  $fr = str_replace("<", "&lt;", $fr);
  $fr = str_replace(">", "&gt;", $fr);
  
  echo "<form method='post' action='{$_SERVER['PHP_SELF']}'>
        <textarea name='newfile' rows='6' cols='40'>{$fr}</textarea>
        <p>
        <input type='submit' name='submit' value='Save' />
        </form>";
  fclose($fo);
}
else
{
  $fo = fopen($file, "w");
  $fw = fwrite($fo, (get_magic_quotes_gpc()?stripslashes($_POST['newfile']):$_POST['newfile']));
  fclose($fo);
echo "<p><h1>DJ message saved!</h1>";
}
?>


</center>

<?php require('bottom.php');?>