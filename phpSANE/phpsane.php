<?php 

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="author" content="root">
<meta name="robots" content="noindex">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<title>phpSANE</title>
</head>
<body onload="paint_area()">';

// phpSANE
// Version: 0.6.0
// John Walsh <john.walsh@mini-net.co.uk>
// Wojciech Bronisz <wojtek@bronisz.eu>

include("functions.php");
include("language.php");
include("config.php");
include("scan.php");

////////////////////////////////////////////////////////////////////////

if (0) {
echo "<style type=\"text/css\">\n<!--\n";
include("css/style.css");
echo "-->\n</style>\n";
}

////////////////////////////////////////////////////////////////////////

echo "<FORM name='menueForm' action='phpsane.php' method='POST'>

	<input type=hidden name='first' value='$first'>
	<input type=hidden name='lang_id' value='$lang_id'>
	<input type=hidden name='sid' value='$sid'>
	<input type=hidden name='preview_images' value='$preview_images'>
	<input type=hidden name='preview_width' value='$PREVIEW_WIDTH_MM'>
	<input type=hidden name='preview_height' value='$PREVIEW_HEIGHT_MM'>
	<input type=hidden name='preview_border' value='$PREVIEW_BORDER_PX'>
	<input type=hidden name='preview_scale' value='$facktor'>\n";


// page header
// 		<td align='left'><b>".$lang[$lang_id][31]."</b><br> &nbsp; &nbsp; &nbsp;".$scan_ausgabe."</td>

echo "<table class='page_header' width='100%'>
	<tr>
		<td align='left' width='465'>
			<input type='image' name='lang_id' value='0' src='./bilder/de.gif' border='0'>
			<input type='image' name='lang_id' value='1' src='./bilder/en.gif' border='0'>
			<input type='image' name='lang_id' value='2' src='./bilder/pl.gif' border='0'>
			<input type='image' name='lang_id' value='3' src='./bilder/fi.gif' border='0'>
			<input type='image' name='lang_id' value='4' src='./bilder/ru.gif' border='0'>
		</td>
		<td align='right'>
			<img src='./bilder/logo.jpg' alt='phpSANE'>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<IMG src='./bilder/black.gif' width='100%' height='2px' align='middle' border='0'>
		</td>
	</tr>
</table>\n";

// page header - end


// testing debug box
if ($do_test_mode) {
	echo "
	<table class='page_body'>
		<tr>
		<td align='center'>Debug <INPUT type='text' name='debug' value='' size='64'></td>
		</tr>
	</table>\n";
}


////////////////////////////////////////////////////////////////////////

// page body

echo "<table class='page_body'>\n";
echo "<tr>\n";

////////////////////////////////////////////////////////////////////////

// control panel area

echo "<td>\n";

if ($scanner_ok) {
	include("menu.php");
} else {
	echo "
	<input type=hidden name='geometry_l' value='".$geometry_l."'>
	<input type=hidden name='geometry_t' value='".$geometry_t."'>
	<input type=hidden name='geometry_x' value='".$geometry_x."'>
	<input type=hidden name='geometry_y' value='".$geometry_y."'>
	<input type=hidden name='format' value='".$format."'>
	<input type=hidden name='mode' value='".$mode."'>
	<input type=hidden name='resolution' value='".$resolution."'>
	<input type=hidden name='negative' value='".$negative."'>
	<input type=hidden name='quality_cal' value='".$quality_cal."'>
	<input type=hidden name='brightness' value='".$brightness."'>

	<table cellspacing='0' border='0' cellpadding='0' align='left'>
		<tr>
			<td class='achtung' align='center' valign='middle'>".$lang[$lang_id][33]."<br><br></td>
		</tr>
		<tr>
			<td align='center' valign='middle'><INPUT type='submit' name='action' value='".$lang[$lang_id][34]."'></td>
		</tr>
	</table>\n";
}

echo "</td>\n";


////////////////////////////////////////////////////////////////////////
// preview area

echo "<td class='tab_preview'>
	<div id='scaner_glass'>
		<div id='scan_preview'>
			<IMG src='$preview_images' width='$PREVIEW_WIDTH_PX' height='$PREVIEW_HEIGHT_PX' border='".$PREVIEW_BORDER_PX."px' name='Preview'>
		</div>
		<div id='scan_area1'></div>
		<div id='scan_area2'></div>
		<div id='scan_area3'></div>
		<div id='scan_area4'></div>
	</div>
</td>\n";


////////////////////////////////////////////////////////////////////////
echo "</tr>
</table>\n";


// page body - end


////////////////////////////////////////////////////////////////////////
// page footer
echo "<table class='page_footer'>\n";


////////////////////////////////////////////////////////////////////////
echo "<tr>
	<td>
		<IMG src='./bilder/black.gif' width='100%' height='2px' align='middle' border='0'>
	</td>
</tr>\n";

////////////////////////////////////////////////////////////////////////
// jdw:
echo "<tr>
	<td>
		# $cmd_device
	</td>
</tr>\n";


////////////////////////////////////////////////////////////////////////
if (0) {
echo "<tr>
	<td>
		$lang[$lang_id][30]</td>
	</td>
</tr>\n";
}


////////////////////////////////////////////////////////////////////////
echo "<tr>
	<td>
	<IMG src='./bilder/black.gif' width='100%' height='2px' align='middle' border='0'>
	</td>
</tr>\n";

////////////////////////////////////////////////////////////////////////

echo "</table>
</FORM>

<script type='text/javascript' src='./javascript/js_fns.js'></script>
<script type='text/javascript' src='./javascript/ractangle.js'></script>

</body>
</html>\n";

?>

