<?PHP
//echo "<FORM name=\"menueForm\" action=\"phpsane.php\" method=\"GET\">\n";
echo "<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" align=\"left\">\n";
echo "<tr>\n";
echo "<td colspan=\"4\" class=\"titel\">".$lang[$lang_id][31]."</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"3\" class=\"text_padd_variabel\">".$scan_ausgabe."</td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\"><IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$padding."\" align=\"middle\" border=\"0\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\" class=\"titel\">".$lang[$lang_id][0]."</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][1]."&nbsp;<INPUT type=\"text\" name=\"geometry_l\" value=\"".$geometry_l."\" size=\"4\" maxlength=\"3\" class=\"text_input\">&nbsp;mm</td>\n";
echo "<td align=\"right\" class=\"text_padd\"><font id=\"ecke_rot1\" class=\"ecke_rot1\">".$lang[$lang_id][5]."</font>&nbsp;<INPUT type=\"radio\" name=\"ecke\" value=\"lo\" checked></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][2]."&nbsp;<INPUT type=\"text\" name=\"geometry_t\" value=\"".$geometry_t."\" size=\"4\" maxlength=\"3\" class=\"text_input\">&nbsp;mm</td>\n";
echo "<td align=\"right\" class=\"text_padd\"><font id=\"ecke_rot2\">".$lang[$lang_id][6]."</font>&nbsp;<INPUT type=\"radio\" name=\"ecke\" value=\"ru\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][3]."&nbsp;<INPUT type=\"text\" name=\"geometry_x\" value=\"".$geometry_x."\" size=\"4\" maxlength=\"3\" class=\"text_input\">&nbsp;mm</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][7]."&nbsp;<INPUT type=\"text\" name=\"PosX\" value=\"0\" size=\"4\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][4]."&nbsp;<INPUT type=\"text\" name=\"geometry_y\" value=\"".$geometry_y."\" size=\"4\" maxlength=\"3\" class=\"text_input\">&nbsp;mm</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][8]."&nbsp;<INPUT type=\"text\" name=\"PosY\" value=\"0\" size=\"4\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\"><INPUT type=\"button\" value=\"DIN-A4\" onclick=\"setGeometry('0','0','215','297')\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\"><IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$padding."\" align=\"middle\" border=\"0\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\" class=\"titel\">".$lang[$lang_id][9]."</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][10]."&nbsp;<SELECT name=\"format\" size=\"1\" class=\"text_input\">\n";
if($format=="jpg") $selected_1="selected"; else $selected_1="";
if($format=="pnm") $selected_2="selected"; else $selected_2="";
if($format=="tif") $selected_3="selected"; else $selected_3="";
echo "<option value=\"jpg\" $selected_1>".$lang[$lang_id][11]."\n";
echo "<option value=\"pnm\" $selected_2>".$lang[$lang_id][12]."\n";
echo "<option value=\"tif\" $selected_3>".$lang[$lang_id][13]."\n";
echo "</SELECT></td>\n";
if($negative=="yes") $checked="checked";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][20]."&nbsp;<INPUT type=\"checkbox\" name=\"negative\" value=\"yes\" ".$checked."></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][14]."&nbsp;<SELECT name=\"mode\" size=\"1\" class=\"text_input\">\n";
if($mode=="Color") $selected_1="selected"; else $selected_1="";
if($mode=="Gray") $selected_2="selected"; else $selected_2="";
if($mode=="Lineart") $selected_3="selected"; else $selected_3="";
echo "<option value=\"Color\" $selected_1>".$lang[$lang_id][15]."\n";
echo "<option value=\"Gray\" $selected_2>".$lang[$lang_id][16]."\n";
echo "<option value=\"Lineart\" $selected_3>".$lang[$lang_id][17]."\n";
echo "</SELECT></td>\n";
if(!$_GET['first']) { $first=1; $checked1="checked"; }
if($quality_cal=="yes") { $checked1="checked"; $first=1; } else { $checked=""; $first=1; }
echo "<input type=hidden name=\"first\" value=\"$first\">\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][21]."&nbsp;<INPUT type=\"checkbox\" name=\"quality_cal\" value=\"yes\" ".$checked1."></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][18]."&nbsp;<INPUT type=\"text\" name=\"resolution\" value=\"".$resolution."\" size=\"4\" maxlength=\"4\" class=\"text_input\"></td>\n";
//echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][22]."&nbsp;<INPUT type=\"text\" value=\"".$brightness."\" name=\"brightness\" size=\"4\" maxlength=\"4\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td>&nbsp;</td>\n";
echo "<td>&nbsp;</td>\n";
//echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][19]."&nbsp;<SELECT name=\"depth\" size=\"1\" class=\"text_input\">\n";
//if($depth=="8") $selected_1="selected"; else $selected_1="";
//if($depth=="12") $selected_2="selected"; else $selected_2="";
//echo "<option value=\"8\" $selected_1>8\n";
//echo "<option value=\"12\" $selected_2>12\n";
//echo "</SELECT></td>\n";
//echo "<td align=\"right\" class=\"text_padd\">".$lang[$lang_id][23]."&nbsp;<INPUT type=\"text\" value=\"".$contrast."\" name=\"contrast\" size=\"4\" maxlength=\"4\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\"><IMG src=\"bilder/clear.gif\" width=\"1\" height=\"".$padding."\" align=\"middle\" border=\"0\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td align=\"center\" colspan=\"4\" class=\"text_padd\">";
if($ocr_test == "yes") echo "<INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][26]."\" class=\"text_input\">&nbsp;&nbsp;&nbsp;";
echo "<INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][25]."\" class=\"text_input\">&nbsp;&nbsp;&nbsp;";
echo "<INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][24]."\" class=\"text_input\">&nbsp;&nbsp;&nbsp;";
echo "<INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][27]."\" class=\"text_input\">&nbsp;&nbsp;&nbsp;";
echo "<INPUT type=\"submit\" name=\"action\" value=\"".$lang[$lang_id][28]."\" class=\"text_input\"></td>\n";
echo "<td>&nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td><IMG src=\"bilder/clear.gif\" width=\"".$m_zelle_1."\" height=\"".$padding."\" border=\"0\"></td>\n";
echo "<td><IMG src=\"bilder/clear.gif\" width=\"".$m_zelle_2."\" height=\"1\" border=\"0\"></td>\n";
echo "<td><IMG src=\"bilder/clear.gif\" width=\"".$m_zelle_2."\" height=\"1\" border=\"0\"></td>\n";
echo "<td><IMG src=\"bilder/clear.gif\" width=\"".$padding."\" height=\"1\" border=\"0\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td colspan=\"4\" height=\"".$padding."\"><IMG src=\"bilder/black.gif\" width=\"".$zelle_1_2_x."\" height=\"2\" align=\"middle\" border=\"0\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td class=\"text_achtung\" align=\"center\" valign=\"middle\">!</td>\n";
echo "<td class=\"text_klein\" align=\"left\" valign=\"top\">".$lang[$lang_id][29]."</td>\n";
echo "<td colspan=\"2\" class=\"text_klein\" align=\"left\" valign=\"top\">".$lang[$lang_id][30]."</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</FORM>\n";
?>