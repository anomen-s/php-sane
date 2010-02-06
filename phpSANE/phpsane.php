<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="David Fr&ouml;hlich">
<meta name="robots" content="noindex">
<title>phpSANE</title>
</head>
<body bgcolor="#FFFFFF">
<div align=center><img src="logo.jpg" height=95 width=455 alt="phpSANE"></div>
<hr>
<br>

<?PHP
include("config.php");

if($aktion == "") {
echo "<font size=\"+1\">With phpSANE you can scan with you web-browser!</font><br>\n";
echo "<br>\n";
echo "Turn on your scanner and put the page you would scan into your scanner.<br>\n";
echo "<form action=\"phpsane.php\" method=get>\n";
echo "<input type=hidden name=\"aktion\" value=\"preview\">\n";
echo "<input type=hidden name=\"sid\" value=\"".time()."\">\n";
echo "<br>\n";
echo "<table>\n";
echo "<tr><td>\n";
echo "<b>Scanner:</b>\n";
echo "</td><td>\n";
echo "<select name=\"scanner\" size=1>\n";
while(list($name,$device) = each($SCANNER)) echo "<option value=\"$device\">$name\n";
echo "</select>\n";
echo "</td></tr><tr><td colspan=2>\n";
echo "<div align=center><input type=submit value=\"Next\"></div>\n";
echo "</tr><td>\n";
echo "</table>\n";
}
else include($aktion.".php");

?>

</body>
</html>
