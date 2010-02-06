<?PHP

$SANE_FIND_SCANNER="/usr/bin/sane-find-scanner";
$SCANIMAGE="/usr/bin/scanimage";
$PNMTOTIFF="/usr/bin/pnmtotiff";
$PNMTOJPEG="/usr/bin/pnmtojpeg";
$GOCR="/usr/bin/gocr";
$SCAN_SPEED="Fastest";

$PHPSANE_ROOT="/var/www/html/phpSANE";
$TMP_PRAEFIX="/tmp";

$PREVIEW_WIDTH_MM=210;
$PREVIEW_HEIGHT_MM=300;
$PREVIEW_WIDTH_PX=122;
$PREVIEW_HEIGHT_PX=178;

$NO_SCANNER_FOUND="No scanners were identified. If you were expecting something different,
check that the scanner is plugged in, turned on and detected by the
sane-find-scanner tool (if appropriate). Please read the documentation
which came with this software (README, FAQ, manpages).";

// BEGIN don't edit
$cmd=$SCANIMAGE." --list-devices";
$sane_scanner = `$cmd`;
unset($cmd);
$start=strpos($sane_scanner,"`")+1;
$laenge=strpos($sane_scanner,"'")-$start;
$default_scanner = substr($sane_scanner,$start,$laenge);
unset($start);
unset($laenge);
// END don't edit

// If you want to specify your scanner manually,
// uncomment the following line (remove the hash)
// and modify it.
# $default_scanner = "hp:/dev/sg1";

$SCANNER = array("Scanner" => "$default_scanner");
?>
