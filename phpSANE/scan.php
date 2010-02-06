<?PHP

$speed=$SCAN_SPEED;
$file_pnm=$TMP_PRAEFIX."_".$sid.".pnm";
$file_tiff=$TMP_PRAEFIX."_".$sid.".tif";
$file_src=$file_tiff;
$file_tgt=$PHPSANE_ROOT."/tmp/".$sid.".tif";
$file_url="tmp/".$sid.".tif";

$cmd_scan = $SCANIMAGE." -d ".$scanner." --mode ".$mode." --resolution ".$resolution."dpi --speed ".$speed." -l ".$geometry_l."mm -t ".$geometry_t."mm -x ".$geometry_x."mm -y ".$geometry_y."mm >".$file_pnm;
$cmd_pnmtotiff = $PNMTOTIFF." -none ".$file_pnm." >".$file_tiff;
$cmd_copy = "cp $file_src $file_tgt";
$cmd_clean = "rm -f ".$TMP_PRAEFIX."_".$sid."*";

echo "Scan in progress ...<br>\n";
$scan=`$cmd_scan`;
echo "Converting into TIFF ...<br>\n";
$pnmtotiff=`$cmd_pnmtotiff`;
echo "Copying und deleting temporary files ...<br>\n";
$copy=`$cmd_copy`;
$clean=`$cmd_clean`;

echo "<br>\n";
echo "You can download the picture at the following URL:<br>\n";
echo "<a href=\"$file_url\"><tt>$file_url</tt></a><br>\n";

echo "<br>\n";
echo "Download the picture and then you can <a href=\"phpsane.php?aktion=clean&sid=$sid\">delete all temporary files</a>.<br>\n";

?>
