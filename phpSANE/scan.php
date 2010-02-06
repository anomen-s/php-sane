<?php
$scan_ausgabe="Scanner = ".$scan_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Device = ".$scanner;
$style_bold="lighter";
$style_color="black";
$style_center="right";
$lang_error=$lang[$lang_id][32];
$error_input=0;

function &scan_error($scan_ausgabe, $style_bold, $style_color, $style_center, $error_input, $lang_error) {
$scan_ausgabe="!!!!!!!! ".$lang_error." !!!!!!!!";
$style_bold="bold";
$style_color="red";
$style_center="center";
$error_input=1;
}

if($geometry_l >= 0 && $geometry_l <= 215) $cmd_geometry_l=" -l ".$geometry_l."mm"; else {
$lang[$lang_id][1]="<font style=\"color:red;\">".$lang[$lang_id][1]."</font>";
scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, &$error_input, $lang_error);
}
if($geometry_t >= 0 && $geometry_t <= 297) $cmd_geometry_t=" -t ".$geometry_t."mm"; else {
$lang[$lang_id][2]="<font style=\"color:red;\">".$lang[$lang_id][2]."</font>";
scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, &$error_input, $lang_error);
}
if($geometry_x >= 0 && $geometry_x <= 215) $cmd_geometry_x=" -x ".$geometry_x."mm"; else {
$lang[$lang_id][3]="<font style=\"color:red;\">".$lang[$lang_id][3]."</font>";
scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, &$error_input, $lang_error);
}
if($geometry_y >= 0 && $geometry_y <= 297) $cmd_geometry_y=" -y ".$geometry_y."mm"; else {
$lang[$lang_id][4]="<font style=\"color:red;\">".$lang[$lang_id][4]."</font>";
scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, &$error_input, $lang_error);
}
$cmd_format=" --format=".$format;
$cmd_mode=" --mode=".$mode;
//$cmd_depth=" --depth ".$depth;
if($resolution < 4) $cmd_resolution=""; else {
if($resolution >= 5 && $resolution <= 600) $cmd_resolution=" --resolution ".$resolution."dpi"; else {
$lang[$lang_id][18]="<font style=\"color:red;\">".$lang[$lang_id][18]."</font>";
scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, &$error_input, $lang_error);
}
}

if($negative == "yes") $cmd_negative=" --negative=yes"; else $cmd_negative="";
if($quality_cal == "yes") $cmd_quality_cal=" --quality-cal=yes"; else $cmd_quality_cal="";
//if($brightness) {
//if($brightness >= -100 && $brightness <= 100) $cmd_brightness=" --brightness ".$brightness."%"; else {
//$lang[$lang_id][22]="<font style=\"color:red;\">".$lang[$lang_id][22]."</font>";
//scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, $lang_error);
//}
//} else {
//$cmd_brightness="";
//}
//if($contrast) {
//if($contrast >= -100 && $contrast <= 100) $cmd_contrast=" --contrast ".$contrast."%"; else {
//$lang[$lang_id][23]="<font style=\"color:red;\">".$lang[$lang_id][23]."</font>";
//scan_error(&$scan_ausgabe, &$style_bold, &$style_color, &$style_center, $lang_error);
//}
//} else {
//$cmd_contrast="";
//}

$cmd_scan=$SCANIMAGE." -d ".$scanner.$cmd_geometry_l.$cmd_geometry_t.$cmd_geometry_x.$cmd_geometry_y.$cmd_format.$cmd_mode.$cmd_resolution.$cmd_negative.$cmd_quality_cal;

$cmd_preview=$SCANIMAGE." -d ".$scanner." --resolution ".$PREVIEW_DPI."dpi -l 0mm -t 0mm -x ".$PREVIEW_WIDTH_MM."mm -y ".$PREVIEW_HEIGHT_MM."mm".$cmd_mode.$cmd_negative.$cmd_quality_cal." | ".$PNMTOJPEG." --quality=50";

$cmd_gocr=$SCANIMAGE." -d ".$scanner.$cmd_geometry_l.$cmd_geometry_t.$cmd_geometry_x.$cmd_geometry_y.$cmd_mode.$cmd_resolution.$cmd_quality_cal;

if($error_input == 0) {
//$file_scan=$file.".".$format;
if($action == $lang[$lang_id][24]) {
//$preview_images=$TMP_PRAEFIX."/preview_".$sid.".jpg";
$cmd_preview=$cmd_preview." > ".$preview_images;
$scan_yes=`$cmd_preview`;
}

if($action == $lang[$lang_id][27]) {
if($format == "jpg") {
$cmd_scan=$cmd_scan." | pnmtojpeg --quality=100 > ".$file_scan;
$scan_yes=`$cmd_scan`;
echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "window.open(\"save.php?file=".$file_scan."&lang_id=".$lang_id."\",\"_blank\", \"width=400,height=100,left=320,top=200,scrollbars=no,location=no,status=no,menubar=no\");\n";
echo "</script>\n";
} else {
$cmd_scan=$cmd_scan." > ".$file_scan;
$scan_yes=`$cmd_scan`;
echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "window.open(\"save.php?file=".$file_scan."%26lang_id=".$lang_id."\",\"_blank\", \"width=400,height=100,left=320,top=200,scrollbars=no,location=no,status=no,menubar=no\");\n";
echo "</script>\n";
}
}

if($action == $lang[$lang_id][26]) {
$cmd_scan=$cmd_scan." | ".$OCR." - > ".$file.".txt";
$scan_yes=`$cmd_scan`;
echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "window.open(\"save.php?file=".$file.".txt%26lang_id=".$lang_id."\",\"_blank\", \"width=400,height=100,left=320,top=200,scrollbars=no,location=no,status=no,menubar=no\");\n";
echo "</script>\n";
}
}
if($clean == 1) $cleaner_yes=`$cleaner`;
?>