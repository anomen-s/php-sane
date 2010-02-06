<?PHP

$file_tmp=$TMP_PRAEFIX."_".$sid."*";
$file_phpsane=$PHPSANE_ROOT."/tmp/".$sid."*";

$cmd_clean = "rm -f $file_tmp $file_phpsane";
$clean=`$cmd_clean`;

if($lang=="en") echo "<font size=\"+1\">All temporary files were successfully deleted.</font><br>\n";
if($lang=="de") echo "<font size=\"+1\">Der Scanvorgang wurde erfolgreich abgeschlossen.</font><br>\n";
echo "<br>\n";
if($lang=="en") echo "<a href=\"index.html\">Back</a><br>\n";
if($lang=="de") echo "<a href=\"index.html\">Zur&uuml;ck</a><br>\n";

?>
