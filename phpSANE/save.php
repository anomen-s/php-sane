<?php
$file = $_GET['file'];
$lang_id = $_GET['lang_id'];
include("language.php");
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
echo "<html>\n";
echo "<head>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/save.css\">\n";
echo "<title>Save</title>\n";
echo "</head>\n";
echo "<body bgcolor=\"#FFFFFF\">\n";
echo "<center><br><a href=\"$file\" target=\"_blank\" class=\"link\">".$file."</a><br><br>\n";
echo "<font class=\"link\">".$lang[$lang_id][35]."</font><br><br>\n";
echo "<input class=\"button\" type=\"button\" name=\"close\" value=\"".$lang[$lang_id][36]."\" onClick=\"javascript:window.close();\">\n";
echo "</center></body>\n";
echo "</html>\n";
?>
