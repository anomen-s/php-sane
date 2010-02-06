<?PHP
// CONFIG ------------------------------------------------------------------------------------
$SCANIMAGE="/usr/bin/scanimage";   //  auch mit
$PNMTOJPEG="/usr/bin/pnmtojpeg";   //  eigenen
$OCR="/usr/bin/gocr";              //  Parametern

//$SAVE_PLACE="/srv/www/htdocs/web/phpSANE/";
$SAVE_PLACE="";                    //  mit slach als abschluss Wichtig bei mir local
$TMP_PRAEFIX="tmp";                //  kein slach als abschluss und muss schreibrechte haben


$PREVIEW_WIDTH_MM=216;             //  das solten die apsoluten grösse sein die der scanner kann
$PREVIEW_HEIGHT_MM=298;            //  entspricht hier DIN-A4

$PREVIEW_WIDTH_PX=340;             //  vom scanner übernommen bei 40dpi DIN-A4
$PREVIEW_HEIGHT_PX=468;            //  es solten die werte übernommen werden die der scanner ausgibt
$PREVIEW_DPI=100;                   //  tip ein bild scannen und grösse übernehmen und dpi

$browser_width=900;                //  Absolute Breite des Browser fenster
$padding=15;                       //  Ränder
// END CONFIG -----------------------------------------------------------------------------------

if(`ls $OCR`) $ocr_test="yes";
$TMP_PRAEFIX=$SAVE_PLACE."tmp";    //  don't edit
$width_menue_window=$browser_width - (4 * $padding + $PREVIEW_WIDTH_PX);
if(GetImageSize("bilder/logo.jpg")) {
$logo_size=GetImageSize("bilder/logo.jpg");
$logo_size_width=$logo_size[0];
$logo_size_height=$logo_size[1];
}
                                   // x  1         2          3       4      5
                                   //   |--|-----------------|--|-----------|--|  1
$zelle_1_1_x=$padding;             //   |--|-----------------|--|-----------|--|
$zelle_1_1_y=$padding;             //   |  |                                |  |  2   2_2 = 95x455 ist Logo
$zelle_1_2_x=$width_menue_window;  //   |--------------------------------------|
$zelle_1_3_x=$padding * 2;         //   |--|-----------------|--|-----------|--|  3
$zelle_1_4_x=$PREVIEW_WIDTH_PX;    //   |  |                 |  |           |  |
$zelle_1_5_x=$padding;             //   |  |                 |  |           |  |
$zelle_3_1_y=$padding * 2;         //   |  |                 |  |           |  |  4    4_4 = 340x468
$zelle_4_1_y=$PREVIEW_HEIGHT_PX;   //   |  |                 |  |           |  |
$zelle_5_1_y=$padding;             //   |  |                 |  |           |  |   
                                   //   |  |                 |  |           |  |
                                   //   |--------------------------------------|  5
                                   //   |--------------------------------------|  y

if($_GET['lang_id']) $lang_id=$_GET['lang_id']; else $lang_id=0;
$action=$_GET['action'];
$clear=0;
$clean=0;
if((ereg_replace("&#228;", "9", $lang[$lang_id][28])) == (ereg_replace("\xE4", "9", $action))) { $clean=1; $clear=1; }
if((ereg_replace("&#252;", "9", $lang[$lang_id][25])) == (ereg_replace("\xFC", "9", $action))) $clear=1;
if($_GET['sid']) if($clean == 1) $sid=time(); else $sid=$_GET['sid']; else $sid=time();  //time()
$scanner=$_GET['scanner'];
$scan_name=$_GET['scan_name'];
if($_GET['geometry_l']) if($clear == 1) $geometry_l=0; else $geometry_l=$_GET['geometry_l']; else $geometry_l=0;
if($_GET['geometry_t']) if($clear == 1) $geometry_t=0; else $geometry_t=$_GET['geometry_t']; else $geometry_t=0;
if($_GET['geometry_x']) if($clear == 1) $geometry_x=0; else $geometry_x=$_GET['geometry_x']; else $geometry_x=0;
if($_GET['geometry_y']) if($clear == 1) $geometry_y=0; else $geometry_y=$_GET['geometry_y']; else $geometry_y=0;
$format_1="jpg";
$format_2="pnm";
$format_3="tif";
if($_GET['format']) if($clear == 1) $format=$format_1; else $format=$_GET['format']; else $format=$format_1;
if($_GET['mode']) if($clear == 1) $mode="24bit Color"; else $mode=$_GET['mode']; else $mode="Color";
if($_GET['resolution']) if($clear == 1) $resolution=100; else $resolution=$_GET['resolution']; else $resolution=100;
if($clear == 1) $negative="no"; else $negative=$_GET['negative'];
if($clear == 1) $quality_cal= "yes"; else $quality_cal=$_GET['quality_cal'];
if($clear == 1) $first="";
//if($_GET['depth']) $depth=$_GET['depth']; else $depth="8";   // wers braucht
//$brightness=$_GET['brightness'];    // die werden von meinem scanner leider nicht unterstützt
//$contrast=$_GET['contrast'];
//$gamma=$_GET['gamma'];
$file=$TMP_PRAEFIX."/".$sid;
if($_GET['preview_images']) if($clean == 1) $preview_images="bilder/scan.jpg"; else $preview_images=$_GET['preview_images']; else $preview_images="bilder/scan.jpg";
if($action == $lang[$lang_id][24]) $preview_images=$TMP_PRAEFIX."/preview_".$sid.".jpg";
if($action == $lang[$lang_id][27]) $file_scan=$file.".".$format;
$cleaner="rm -f ".$TMP_PRAEFIX."/*";

$m_zelle_1=$padding * 2;
$m_zelle_2=round((($zelle_1_2_x - $m_zelle_1 - $padding) / 2));

$center_logo=round((($browser_width - ($padding * 2)) / 2) - (70 + ($logo_size_width / 2)));
$position_left=$zelle_1_1_x + $zelle_1_2_x + $zelle_1_3_x;
$position_top=$zelle_1_1_y + $logo_size_height + $zelle_3_1_y;
$position_width=$zelle_1_1_x + $zelle_1_2_x + $zelle_1_3_x + $zelle_1_4_x + $zelle_1_5_x;
$line=$zelle_1_2_x + $zelle_1_3_x + $zelle_1_4_x;
$facktor=round($PREVIEW_WIDTH_MM / $PREVIEW_WIDTH_PX,4);

// BEGIN don't edit
$cmd=$SCANIMAGE." --list-devices | grep device";
$sane_scanner = `$cmd`;
//$sane_scanner="device `umax:/dev/sg0' is a UMAX     Astra 1220S      flatbed scanner";
unset($cmd);
$start=strpos($sane_scanner,"`")+1;
$laenge=strpos($sane_scanner,"'")-$start;
$scanner = "\"".substr($sane_scanner,$start,$laenge)."\"";//
unset($start);
unset($laenge);
// END don't edit

$start=strpos($sane_scanner,"is a")+4;   // mit anderren scannern testen?
$laenge=strpos($sane_scanner,"scanner")-$start;
$scan_name = substr($sane_scanner,$start,$laenge);
unset($start);
unset($laenge);
?>
