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
if(!$lang) $lang="en";

if($aktion) include($aktion.".php");
else {
$start_url="phpsane.php?lang=".$lang."&aktion=start";
if($lang=="en") echo "<font size=\"+1\">Turn on your scanner and <a href=\"$start_url\">continue</a>.</font><br>\n";
if($lang=="de") echo "<font size=\"+1\">Schalten Sie Ihren Scanner an. Dann k&ouml;nnen Sie den Vorgang <a href=\"$start_url\">fortsetzen</a>.</font><br>\n";
}

?>

</body>
</html>
