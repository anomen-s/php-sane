<?PHP

$SANE_FIND_SCANNER="/usr/bin/sane-find-scanner";
$SCANIMAGE="/usr/bin/scanimage";
$PNMTOTIFF="/usr/bin/pnmtotiff";

$SCAN_SPEED="Fastest";

$PHPSANE_ROOT="/var/www/html/users/bilder/phpSANE";
$TMP_PRAEFIX="/tmp/phpsane";

// don't edit the following lines!
$cmd=$SCANIMAGE." --list-devices";
$sane_scanner = `$cmd`;
unset($cmd);
$start=strpos($sane_scanner,"`")+1;
$laenge=strpos($sane_scanner,"'")-$start;
$default_scanner = substr($sane_scanner,$start,$laenge);
unset($start);
unset($laenge);
// END don't edit

$SCANNER = array("Scanner" => "$default_scanner");
?>
