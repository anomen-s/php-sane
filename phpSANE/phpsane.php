<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="root">
<meta name="robots" content="noindex">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>phpSANE</title>
<?PHP
include("language.php");
include("config.php");
include("scan.php");

echo "<style type=\"text/css\">\n";
echo "<!--\n";
include("css/style.css");
echo "-->\n";
echo "</style>\n";
echo "</head>\n";
echo "<body bgcolor=\"#FFFFFF\">\n";
echo "<FORM name=\"menueForm\" action=\"phpsane.php\" method=\"GET\">\n";
echo "<input type=hidden name=\"lang_id\" value=\"".$lang_id."\">\n";
echo "<input type=hidden name=\"sid\" value=\"$sid\">\n";
echo "<input type=hidden name=\"preview_images\" value=\"$preview_images\">\n";
echo "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" align=\"left\" class=\"links_oben\">\n";
echo "    <tr>\n";
echo "      <td>\n";
echo "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" align=\"left\">\n";
echo "    <tr>\n";
echo "      <td align=\"left\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"".$zelle_1_1_x."\" height=\"".$zelle_1_1_y."\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td align=\"left\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"".$zelle_1_2_x."\" height=\"1\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td align=\"left\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"".$zelle_1_3_x."\" height=\"1\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td align=\"left\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"".$zelle_1_4_x."\" height=\"1\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td align=\"left\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"".$zelle_1_5_x."\" height=\"1\" align=\"left\" border=\"0\"><br></td>\n";
echo "    </tr>\n";
echo "    <tr>\n";
echo "      <td>&nbsp;</td>\n";
echo "      <td colspan=\"3\" align=\"left\" valign=\"middle\">\n";
echo "<input type=\"image\" name=\"lang_id\" value=\"1\" src=\"bilder/de.gif\"><IMG src=\"bilder/clear.gif\" width=\"10\" height=\"1\" border=\"0\"><input type=\"image\" name=\"lang_id\" value=\"0\" src=\"bilder/en.gif\"><IMG src=\"bilder/clear.gif\" width=\"".$center_logo."\" height=\"1\" border=\"0\"><img src=\"bilder/logo.jpg\" height=\"".$logo_size_height."\" width=\"".$logo_size_width."\" alt=\"phpSANE\" border=\"0\"><br></td>\n";
echo "      <td>&nbsp;</td>\n";
echo "    </tr>\n";
echo "    <tr>\n";
echo "      <td align=\"center\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$zelle_3_1_y."\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td colspan=\"3\" align=\"center\" valign=\"middle\">\n";
echo "      <IMG src=\"bilder/black.gif\" width=\"".$line."\" height=\"2\" align=\"middle\" border=\"0\"><br></td>\n";
echo "      <td>&nbsp;</td>\n";
echo "    </tr>\n";
echo "    <tr>\n";
echo "      <td><IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$zelle_4_1_y."\" align=\"left\" border=\"0\"><br></td>\n";
echo "      <td class=\"text\" align=\"left\" valign=\"top\">\n";
if($scanner) include("menu.php"); else {
echo "<FORM name=\"menueForm\" action=\"phpsane.php?lang_id=".$lang_id."sid=".$sid."geometry_l=".$geometry_l."geometry_t=".$geometry_t."geometry_x=".$geometry_x."geometry_y=".$geometry_y."format=".$format."mode=".$mode." resolution=".$resolution."negative=".$negative."quality_cal=".$quality_cal."first=".$first."\" method=\"GET\">\n";
echo "<input type=hidden name=\"sid\" value=\"".$sid."\">\n";
echo "<input type=hidden name=\"geometry_l\" value=\"".$geometry_l."\">\n";
echo "<input type=hidden name=\"geometry_t\" value=\"".$geometry_t."\">\n";
echo "<input type=hidden name=\"geometry_x\" value=\"".$geometry_x."\">\n";
echo "<input type=hidden name=\"geometry_y\" value=\"".$geometry_y."\">\n";
echo "<input type=hidden name=\"format\" value=\"".$format."\">\n";
echo "<input type=hidden name=\"mode\" value=\"".$mode."\">\n";
echo "<input type=hidden name=\"resolution\" value=\"".$resolution."\">\n";
echo "<input type=hidden name=\"negative\" value=\"".$negative."\">\n";
echo "<input type=hidden name=\"quality_cal\" value=\"".$quality_cal."\">\n";
echo "<input type=hidden name=\"first\" value=\"".$first."\">\n";
echo "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" align=\"left\">\n";
echo "<tr>\n";
echo "<td class=\"achtung\" align=\"center\" valign=\"middle\">".$lang[$lang_id][33]."<br><br></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td class=\"titel\" align=\"center\" valign=\"middle\"><INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][34]."\" class=\"titel\"></td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</FORM>\n";
}
echo "      </td>\n";
echo "      <td>&nbsp;</td>\n";
echo "      <td>\n";
echo "<IMG src=\"".$preview_images."\" width=\"".$PREVIEW_WIDTH_PX."\" height=\"".$PREVIEW_HEIGHT_PX."\" align=\"left\" border=\"0\" class=\"scan_bild\" name=\"Preview\"><br>\n";
echo "      </td>\n";
echo "      <td>&nbsp;</td>\n";
echo "    </tr>\n";
echo "    <tr>\n";
echo "      <td colspan=\"5\" align=\"center\" valign=\"top\">\n";
echo "      <IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$zelle_5_1_y."\" align=\"left\" border=\"0\"><br></td>\n";
echo "    </tr>\n";
echo "</table>\n";

echo "      </td>\n";
echo "    </tr>\n";
echo "</table>\n";
echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "<!--\n";
include("javascript/position.js");
echo "//-->\n";
echo "</script>\n";
?>

</body>
</html>
