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
if($lang=="en") echo "Please click only <u>once</u> on every button/link and do not use your browser's stop-icon!<br>\n";
if($lang=="de") echo "Bitte klicken Sie nur <u>einmal</u> auf jeden Knopf/Link und klicken Sie auf keinen Fall auf den Stopp-Knopf Ihres Browser!<br>\n";
}

?>

</body>
</html>
