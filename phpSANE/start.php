<?PHP

if($default_scanner == $NO_SCANNER_FOUND) {
if($lang=="en") echo "<font size=\"+1\"><b>Error:</b> No scanner was found.</font><br>\n";
if($lang=="de") echo "<font size=\"+1\"><b>Fehler:</b> Es wurde kein Scanner gefunden.</font><br>\n";
if($lang=="en") echo "Turn on your scanner and <a href=\"javascript:location.reload()\">reload this page</a>.<br>\n";
if($lang=="de") echo "Schalten Sie den Scanner ein und <a href=\"javascript:location.reload()\">laden Sie diese Seite neu</a>.<br>\n";
echo "</body>\n</html>\n";
exit;
}
if($lang=="en") echo "<font size=\"+1\">With phpSANE you can scan with your web-browser!</font><br>\n";
if($lang=="de") echo "<font size=\"+1\">Mit phpSANE k&ouml;nnen Sie mit Ihrem Web-Browser scannen!</font><br>\n";
echo "<br>\n";
echo "<form action=\"phpsane.php\" method=get>\n";
echo "<input type=hidden name=\"lang\" value=\"".$lang."\">\n";
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
echo "</td></tr><tr><td>\n";
if($lang=="en") echo "<b>Preview:</b>\n";
if($lang=="de") echo "<b>Vorschau:</b>\n";
echo "</td><td>\n";
echo "<input type=checkbox name=\"preview\" value=\"1\">\n";
echo "</td></tr><tr><td colspan=2>\n";
echo "<div align=center><input type=submit value=\"Start\"></div>\n";
echo "</tr><td>\n";
echo "</table>\n";

?>
