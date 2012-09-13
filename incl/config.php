<?php
// CONFIG --------------------------------------------------------------

// system config
// =============

switch(php_uname('s')){
	case 'FreeBSD':
		$SCAN_HOME   = "/usr/local/bin/";
		$MAGICK_HOME = "/usr/local/bin/";
		break;
	default:
		$SCAN_HOME   = "/usr/bin/";
		$MAGICK_HOME = "/usr/bin/";
		break;
}
$SCANIMAGE   = $SCAN_HOME . "scanimage";   //  scanimage binary (sane)
$PNMTOJPEG   = $SCAN_HOME . "pnmtojpeg";   //  netpbm conversion
$PNMTOTIFF   = $SCAN_HOME . "pnmtotiff";   //  netpbm conversion
$OCR         = $SCAN_HOME . "gocr";        //  optional ocr binary
$CONVERT     = $MAGICK_HOME . "convert";   //  PDF Support
$IDENTIFY    = $MAGICK_HOME . "identify";  //  Used to test for PDF support
$file_output = "./output/";                //  destination directory for scanned files
$save_type   = "link";                     //  link  /  popup

// set up a string to be prepended to the scanimage command, so that
// scanimage looks for devices at the ip making the request
//$SCAN_NET_SETUP = 'export SANE_NET_HOSTS='.$_SERVER['REMOTE_ADDR'].' && ';
$SCAN_NET_SETUP = '';


// user config
// ===========

// default language
// 0 = german
// 1 = english
// 2 = polish
// 3 = finnish
// 4 = russian
// 5 = ukrainian
// 6 = french

$lang_id = 0;


// where to save all working files (scans...)

//$SAVE_PLACE="/srv/www/htdocs/web/phpSANE/";
$SAVE_PLACE = "./";


// set your scanner maxiumum page size, and a low dpi for previews

$PREVIEW_WIDTH_MM   = 215;
$PREVIEW_HEIGHT_MM  = 297;
$PREVIEW_DPI        = 100;


// set the preview image on-screen size

$PREVIEW_WIDTH_PX   = $PREVIEW_WIDTH_MM * 2;
$PREVIEW_HEIGHT_PX  = $PREVIEW_HEIGHT_MM * 2;
$PREVIEW_BORDER_PX  = 4;


// set the list of page sizes to select from

$PAGE_SIZE_LIST = array();

// ref: page sizes in mm (http://en.wikipedia.org/wiki/Paper_size)

// NB. only pages within your scanner size will be included

add_page_size('A0', 841, 1189);
add_page_size('A1', 594, 841);
add_page_size('A2', 420, 594);
add_page_size('A3', 297, 420);
add_page_size('A4', 210, 297);
add_page_size('A5', 148, 210);
add_page_size('A6', 105, 148);
//add_page_size('A7', 74, 105);
//add_page_size('A8', 52, 74);
//add_page_size('A9', 37, 52);
//add_page_size('A10', 26, 37);
add_page_size('US Letter', 216, 279);
add_page_size('US Legal', 216, 356);
add_page_size('US Ledger', 432, 279);
add_page_size('US Tabloid', 279, 432);


// enable features

$do_test_mode   = 0;

$do_negative    = 0;
$do_quality_cal = 0;
$do_brightness  = 0;
$do_usr_opt     = 1;

$do_ocr = 0;
if (`ls $OCR`) $do_ocr = 1;

$do_pdf = 0;
if (`ls $CONVERT` && `ls $IDENTIFY` && `$IDENTIFY -list Format | grep -i pdf`) $do_pdf = 1;


// END CONFIG ----------------------------------------------------------

// first visit and clean/clear options

$first=1;
$clear=0; // jdw: does not do anything ?
$clean=0;

if (isset($_POST['first'])) $first=$_POST['first'];
if ($first) { $clean=1; $clear=1; }
$first=0;

if(isset($_POST['lang_id'])) { $lang_id=$_POST['lang_id']; }

$action="";
if(isset($_POST['action'])) { $action=$_POST['action']; }
if((ereg_replace("&#228;", "9", $lang[$lang_id][28])) == (ereg_replace("\xE4", "9", $action))) { $clean=1; $clear=1; }
if((ereg_replace("&#252;", "9", $lang[$lang_id][25])) == (ereg_replace("\xFC", "9", $action))) $clear=1;


// default options

$sid=time();

$preview_images="./bilder/scan.jpg";

$geometry_l=0;
$geometry_t=0;
$geometry_x=0;
$geometry_y=0;

//$format="jpg";
$format="pdf";
//$mode="24bit Color";  // 24bit Color, True Gray, Black & White
$mode="Color";  // Lineart|Gray|Color
//$resolution=150;
$resolution=300;

$negative="no";
$quality_cal= "no";
$brightness="0";

$usr_opt="";


// user options

if (!$clean) {
	if (isset($_POST['sid'])) $sid=$_POST['sid'];

	if (isset($_POST['preview_images'])) $preview_images=$_POST['preview_images'];

	if (isset($_POST['geometry_l'])) $geometry_l=$_POST['geometry_l'];
	if (isset($_POST['geometry_t'])) $geometry_t=$_POST['geometry_t'];
	if (isset($_POST['geometry_x'])) $geometry_x=$_POST['geometry_x'];
	if (isset($_POST['geometry_y'])) $geometry_y=$_POST['geometry_y'];

	if (isset($_POST['format'])) $format=$_POST['format'];
	if (isset($_POST['mode'])) $mode=$_POST['mode'];
	if (isset($_POST['resolution'])) $resolution=$_POST['resolution'];

	if (isset($_POST['negative'])) $negative="yes";
	if (isset($_POST['quality_cal'])) $quality_cal="yes";
	if (isset($_POST['brightness'])) $brightness=$_POST['brightness'];

	if (isset($_POST['usr_opt'])) $usr_opt=$_POST['usr_opt'];
}

//if (isset($_POST['scanner'])) $scanner=$_POST['scanner'];
//if (isset($_POST['scan_name'])) $scan_name=$_POST['scan_name'];
//if($_POST['depth']) $depth=$_POST['depth']; else $depth="8";   // wers braucht


// verify usr_opt - keep only valid chars, otherwise replace with an 'X'

$my_usr_opt = '';

for ($i = 0; $i < strlen($usr_opt); $i++) {
	if (preg_match('([0-9]|[a-z]|[A-Z]|[\ \%\+\-_=])', $usr_opt[$i])) {
		$my_usr_opt .= $usr_opt[$i];
	} else {
		$my_usr_opt .= 'X';
	}
}

$usr_opt = $my_usr_opt;


// INTERNAL CONFIG -----------------------------------------------------

// file names setup

$TMP_PRAEFIX=$SAVE_PLACE."tmp/";   //  kein slach als abschluss und muss schreibrechte haben

$file_base=$TMP_PRAEFIX.$sid;

$cleaner="rm -f ".$TMP_PRAEFIX."*";


// scale factor to map preview image -> scanner co-ords

$facktor = round($PREVIEW_WIDTH_MM / $PREVIEW_WIDTH_PX, 4);


// scanner device detect

$scanner_ok = false;

if ($do_test_mode) {
	$sane_result = "device `plustek:libusb:004:002' is a Plustek OpticPro U24 flatbed scanner";
} else {
	$sane_cmd = $SCAN_NET_SETUP . $SCANIMAGE . " --list-devices | grep -e '\(scanner\|hpaio\|multi-function\)'";
	$sane_cmd;
	$sane_result = exec($sane_cmd);
	$sane_result;
	unset($sane_cmd);
}


$start = strpos($sane_result, "`") + 1;
$length = strpos($sane_result, "'") - $start;
$scanner = "\"".substr($sane_result, $start, $length)."\"";
unset($start);
unset($length);


if (strlen($scanner) > 2) {
	$scanner_ok = true;
}

$start = strpos($sane_result, "is a") + 4;   // mit anderren scannern testen?
$length = strpos($sane_result, "scanner") - $start;
$scan_name = substr($sane_result, $start, $length);
unset($start);
unset($length);
unset($sane_result);

$scan_ausgabe = $scan_name . "<br> &nbsp; &nbsp; &nbsp; Device = " . $scanner;


// scanner device capabilities

// allowed resolutions

$sane_cmd = $SCANIMAGE . " -h -d$scanner";
$sane_result = `$sane_cmd`;
unset($sane_cmd);

if ($do_test_mode) {
	$sane_result = "   --resolution 50..2450dpi [50]\n   --mode auto|Color|Gray [Color]\n";
}

$sane_result_arr = explode("\n", $sane_result);
unset($sane_result);


// Mode
$sane_result_mode = preg_grep('/--mode /', $sane_result_arr);
$sane_result_mode = end($sane_result_mode);

#$modes = preg_replace('/^.*--mode.*([a-z\|-]*).*$/iU','$1', $sane_result_mode);
$modes = preg_replace('/^.*--mode ([a-z|]*)[ \t].*$/iU','$1', $sane_result_mode);
$mode_list = explode('|', $modes);
unset($sane_result_mode);


// Resolution
$sane_result_reso = preg_grep('/--resolution /', $sane_result_arr);
$sane_result_reso = end($sane_result_reso);

$start = strpos($sane_result_reso, "n") + 2;
$length = strpos($sane_result_reso, "dpi") - $start;
$list = "" . substr($sane_result_reso, $start,$length) . "";
unset($start);
unset($length);
unset($sane_result_reso);

unset($sane_result_arr);

// change "|" separated string $list into array of values
// or generate a range of values.

$length = strpos($list, "..");
if ($length === false) {
	$resolution_list = explode("|" , $list);

	$resolution_max = (int)end($resolution_list);
	$resolution_min = (int)reset($resolution_list);
} else {
	$resolution_list = array();

	$resolution_min = (int)substr($list, 0, $length);
	$resolution_max = (int)substr($list, $length + 2);

	// lower resolutions

	$list = array(
		10, 20, 30, 40, 50, 60, 72, 75, 80, 90,
		100, 120, 133, 144, 150, 160, 175, 180,
		200, 216, 240, 266,
		300, 320, 350, 360,
		400, 480,
		600,
		720,
		800,
		900,
	);

	foreach ($list as $res) {
		if (($res >= $resolution_min) && ($res <= $resolution_max)) {
			$resolution_list[] = $res;
		}
	}

	// higher resolutions

	$res = 1000;
	while (($res >= $resolution_min) && ($res < $resolution_max)) {
		$resolution_list[] = $res;
		$res += 200;
	}

	$resolution_list[] = $resolution_max;
}
unset($length);

?>

