<?php 

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="root">
<meta name="robots" content="noindex">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<title>phpSANE</title>
</head>
<body>';

// phpSANE
// Version: 0.5.0
// John Walsh <john.walsh@mini-net.co.uk>

include("functions.php");
include("language.php");
include("config.php");
include("scan.php");

////////////////////////////////////////////////////////////////////////

if (0)
{
echo "<style type=\"text/css\">\n";
echo "<!--\n";
include("css/style.css");
echo "-->\n";
echo "</style>\n";
}

////////////////////////////////////////////////////////////////////////

echo "<FORM name=\"menueForm\" action=\"phpsane.php\" method=\"GET\">

<input type=hidden name=\"first\" value=\"$first\">
<input type=hidden name=\"lang_id\" value=\"$lang_id\">
<input type=hidden name=\"sid\" value=\"$sid\">
<input type=hidden name=\"preview_images\" value=\"$preview_images\">
<input type=hidden name=\"preview_width\" value=\"$PREVIEW_WIDTH_MM\">
<input type=hidden name=\"preview_height\" value=\"$PREVIEW_HEIGHT_MM\">
<input type=hidden name=\"preview_border\" value=\"$PREVIEW_BORDER_PX\">
<input type=hidden name=\"preview_scale\" value=\"$facktor\">\n";


// page header
// 		<td align='left'><b>".$lang[$lang_id][31]."</b><br> &nbsp; &nbsp; &nbsp;".$scan_ausgabe."</td>

echo "<table class='page_header' width='100%'>
	<tr>
		<td align='left' width='465'>
			<input type='image' name='lang_id' value='0' src='./bilder/de.gif' border='0'>
			<input type='image' name='lang_id' value='1' src='./bilder/en.gif' border='0'>
			<input type='image' name='lang_id' value='2' src='./bilder/pl.gif' border='0'>
		</td>
		<td align='right'>
			<img src='./bilder/logo.jpg' alt='phpSANE'>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<IMG src=\"./bilder/black.gif\" width=\"100%\" height=\"2px\" align=\"middle\" border=\"0\">
		</td>
	</tr>
</table>\n";

// page header - end


// testing debug box

if ($do_test_mode)
{
echo "<table class=\"page_body\">\n";
echo "<tr>\n";
echo "<td align=\"center\">\n";
echo "Debug <INPUT type=\"text\" name=\"debug\" value=\"\" size=\"64\">\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
}


////////////////////////////////////////////////////////////////////////

// page body

echo "<table class=\"page_body\">\n";
echo "<tr>\n";

////////////////////////////////////////////////////////////////////////

// control panel area

echo "<td>\n";

if ($scanner_ok)
{
  include("menu.php");
}
else
{
  if (0)
  {
    echo "<input type=hidden name=\"geometry_l\" value=\"".$geometry_l."\">\n";
    echo "<input type=hidden name=\"geometry_t\" value=\"".$geometry_t."\">\n";
    echo "<input type=hidden name=\"geometry_x\" value=\"".$geometry_x."\">\n";
    echo "<input type=hidden name=\"geometry_y\" value=\"".$geometry_y."\">\n";
    echo "<input type=hidden name=\"format\" value=\"".$format."\">\n";
    echo "<input type=hidden name=\"mode\" value=\"".$mode."\">\n";
    echo "<input type=hidden name=\"resolution\" value=\"".$resolution."\">\n";
    echo "<input type=hidden name=\"negative\" value=\"".$negative."\">\n";
    echo "<input type=hidden name=\"quality_cal\" value=\"".$quality_cal."\">\n";
    echo "<input type=hidden name=\"brightness\" value=\"".$brightness."\">\n";
  }

  echo "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" align=\"left\">\n";
  echo "<tr>\n";
  echo "<td class=\"achtung\" align=\"center\" valign=\"middle\">".$lang[$lang_id][33]."<br><br></td>\n";
  echo "</tr>\n";
  echo "<tr>\n";
  echo "<td align=\"center\" valign=\"middle\"><INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][34]."\"></td>\n";
  echo "</tr>\n";
  echo "</table>\n";
}

echo "</td>\n";

////////////////////////////////////////////////////////////////////////

// preview area

echo "<td class=\"tab_preview\">
	<div id='scaner_glass'>
		<div id='scan_preview'>
			<IMG src=\"$preview_images\" width=\"$PREVIEW_WIDTH_PX\" height=\"$PREVIEW_HEIGHT_PX\" border=\"{$PREVIEW_BORDER_PX}px\" name=\"Preview\">
		</div>
			<div id='scan_area1'></div>
			<div id='scan_area2'></div>
			<div id='scan_area3'></div>
			<div id='scan_area4'></div>
	</div>
</td>\n";

////////////////////////////////////////////////////////////////////////

echo "</tr>\n";
echo "</table>\n";

if (0)
{
echo "<p>\n";
echo "width=\"$PREVIEW_WIDTH_PX\" height=\"$PREVIEW_HEIGHT_PX\"\n";
echo "</p>\n";
}

// page body - end

////////////////////////////////////////////////////////////////////////

// page footer

echo "<table class=\"page_footer\">\n";

////////////////////////////////////////////////////////////////////////

echo "<tr>\n";
echo "<td>\n";
echo "<IMG src=\"./bilder/black.gif\" width=\"100%\" height=\"2px\" align=\"middle\" border=\"0\">\n";
echo "</td>\n";
echo "</tr>\n";

////////////////////////////////////////////////////////////////////////

// jdw:
echo "<tr>\n";
echo "<td>\n";
echo "# $cmd_device\n";
echo "</td>\n";
echo "</tr>\n";

////////////////////////////////////////////////////////////////////////

if (0)
{
echo "<tr>\n";
echo "<td>\n";
echo "$lang[$lang_id][30]</td>\n";
echo "</td>\n";
echo "</tr>\n";
}

////////////////////////////////////////////////////////////////////////

echo "<tr>\n";
echo "<td>\n";
echo "<IMG src=\"./bilder/black.gif\" width=\"100%\" height=\"2px\" align=\"middle\" border=\"0\">\n";
echo "</td>\n";
echo "</tr>\n";

////////////////////////////////////////////////////////////////////////

echo "</table>\n";

// page footer - end

////////////////////////////////////////////////////////////////////////

// inline javascript functions, after form areas

echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "<!--\n";
include("javascript/js_fns.js");
include("javascript/ractangle.js");
echo "//-->\n";
echo "</script>\n";

echo "</FORM>\n";
?>

</body>
</html>
