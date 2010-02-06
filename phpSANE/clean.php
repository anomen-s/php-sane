<?PHP

$file_tmp=$TMP_PRAEFIX."_".$sid."*";
$file_phpsane=$PHPSANE_ROOT."/tmp/".$sid."*";

$cmd_clean = "rm -f $file_tmp $file_phpsane";
$clean=`$cmd_clean`;

echo "<font size=\"+1\">All temporary files are successfully deleted.</font><br>\n";
echo "<br>\n";
echo "<a href=\"index.html\">Back</a><br>\n";

?>
