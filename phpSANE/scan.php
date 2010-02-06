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

if($lang=="en") echo "Scanning ...<br>\n";
if($lang=="de") echo "Scanne ...<br>\n";
$scan=`$cmd_scan`;
if($lang=="en") echo "Converting to TIFF ...<br>\n";
if($lang=="de") echo "Wandle in TIFF ...<br>\n";
$pnmtotiff=`$cmd_pnmtotiff`;
if($lang=="en") echo "Copying and deleting temporary files ...<br>\n";
if($lang=="de") echo "Kopiere und l&ouml;sche tempor&auml;re Dateien ...<br>\n";
$copy=`$cmd_copy`;
$clean=`$cmd_clean`;

echo "<br>\n";
if($lang=="en") echo "You can download the image under the following URL:<br>\n";
if($lang=="de") echo "Sie k&ouml;nnen das gescannte Bild unter folgender URL abrufen:<br>\n";
echo "<a href=\"$file_url\"><tt>$file_url</tt></a><br>\n";

echo "<br>\n";
if($lang=="en") echo "Save the image and then you can <a href=\"phpsane.php?lang=$lang&aktion=clean&sid=$sid\">delete all temporary files</a>.<br>\n";
if($lang=="de") echo "Speichern Sie das Bild lokal ab, danach k&ouml;nnen Sie <a href=\"phpsane.php?lang=$lang&aktion=clean&sid=$sid\">den Scanvorgang abschlie&szlig;en</a>.<br>\n";

?>
