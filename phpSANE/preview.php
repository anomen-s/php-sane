<?PHP

if($preview == "1") {

}

echo "<form name=\"previewForm\" action=\"phpsane.php\" method=get>\n";
echo "<input type=hidden name=\"aktion\" value=\"scan\">\n";
echo "<input type=hidden name=\"sid\" value=\"$sid\">\n";
echo "<input type=hidden name=\"scanner\" value=\"$scanner\">\n";
echo "<table>\n";
echo "<tr><td>\n";
echo "<b>X-Offset:</b>\n";
echo "</td><td>\n";
echo "<input type=text name=\"geometry_l\" value=\"0\" size=4 maxlength=3>&nbsp;mm\n";
echo "</td></tr><tr><td>\n";
echo "<b>Y-Offset:</b>\n";
echo "</td><td>\n";
echo "<input type=text name=\"geometry_t\" value=\"0\" size=4 maxlength=3>&nbsp;mm\n";
echo "</td></tr><tr><td>\n";
echo "<b>Width:</b>\n";
echo "</td><td>\n";
echo "<input type=text name=\"geometry_x\" value=\"0\" size=4 maxlength=3>&nbsp;mm\n";
echo "</td></tr><tr><td>\n";
echo "<b>Height:</b>\n";
echo "</td><td>\n";
echo "<input type=text name=\"geometry_y\" value=\"0\" size=4 maxlength=3>&nbsp;mm\n";
echo "</td></tr><tr><td colspan=2>\n";
echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
echo "<!--\n";
echo "function setGeometry(l,t,x,y) {\n";
echo "document.previewForm.geometry_l.value = l;\n";
echo "document.previewForm.geometry_t.value = t;\n";
echo "document.previewForm.geometry_x.value = x;\n";
echo "document.previewForm.geometry_y.value = y;\n";
echo "}\n";
echo "//-->\n";
echo "</script>\n";
echo "<a href=\"javascript:setGeometry('0','0','210','297')\">DIN-A4</a>\n";
echo "</td></tr><tr><td>\n";
echo "<b>Resolution:</b>\n";
echo "</td><td>\n";
echo "<input type=text name=\"resolution\" value=\"150\" size=4 maxlength=3>&nbsp;DPI\n";
echo "</td></tr><tr><td>\n";
echo "<b>Modus:</b>\n";
echo "</td><td>\n";
echo "<select name=\"mode\" size=1>\n";
echo "<option value=\"Lineart\">Lineart\n";
echo "<option value=\"Gray\" selected>Gray\n";
echo "<option value=\"Color\">Color\n";
echo "</select>\n";
echo "</td></tr><tr><td colspan=2>\n";
echo "<br>\n";
echo "<input type=reset value=\"Clear\"><br><input type=submit value=\"Scan\">\n";
echo "</td></tr>\n";
echo "</table>\n";
echo "</form>\n";

?>
