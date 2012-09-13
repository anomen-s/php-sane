<?php

echo "
<table class='tab_menu'>
	<col width='50%'>
	<col width='50%'>";

////////////////////////////////////////////////////////////////////////
if (($file_save !== '')&&($save_type=='link')) {
	echo "
	<tr>
		<th align='left'>".$lang[$lang_id][31]."</th>
		<th colspan='2'>".$lang[$lang_id][42].": </th>
	</tr>
	<tr>
	<td align='left'> &nbsp; &nbsp; &nbsp;".$scan_ausgabe."</td>
	<td align='left'> &nbsp; &nbsp; &nbsp; <a href='".$file_save."' target='_blank'>".str_replace($file_output,"",$file_save)."</a></td>
	</tr>";
} else {
	echo "
	<tr>
		<th align='left'>".$lang[$lang_id][31]."</th>
	</tr>
	<tr>
		<td align='left'> &nbsp; &nbsp; &nbsp;".$scan_ausgabe."</td>
	</tr>";
}


////////////////////////////////////////////////////////////////////////
if (0) {
	echo "
	<tr>
		<td align='left'>1</td>
		<td align='left'>2</td>
		<td align='left'>3</td>
		<td align='left'>4</td>
	</tr>";
}


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<th colspan='2'>".$lang[$lang_id][0]."</th>
	</tr>";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][1]."&nbsp;<INPUT type='text' name='geometry_l' id='pozL' value='".$geometry_l."' size='4' maxlength='3'>&nbsp;mm</td>
		<td align='right'><font id='ecke_rot1' class='ecke_rot1'>".$lang[$lang_id][5]."</font>&nbsp;<INPUT type='radio' name='ecke' value='lo' checked></td>
	</tr>";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
	<td align='right'>".$lang[$lang_id][2]."&nbsp;<INPUT type='text' name='geometry_t' id='pozT' value='".$geometry_t."' size='4' maxlength='3'>&nbsp;mm</td>
	<td align='right'><font id='ecke_rot2'>".$lang[$lang_id][6]."</font>&nbsp;<INPUT type='radio' name='ecke' value='ru'></td>
	</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][3]."&nbsp;<INPUT type='text' name='geometry_x' id='geometry_x' value='".$geometry_x."' size='4' maxlength='3' >&nbsp;mm</td>
		<td align='right'>".$lang[$lang_id][7]."&nbsp;<INPUT type='text' name='PosX' value='0' size='4'></td>
	</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][4]."&nbsp;<INPUT type='text' name='geometry_y' id='geometry_y' value='".$geometry_y."' size='4' maxlength='3'>&nbsp;mm</td>
		<td align='right'>".$lang[$lang_id][8]."&nbsp;<INPUT type='text' name='PosY' value='0' size='4'></td>
	</tr>\n";

////////////////////////////////////////////////////////////////////////

echo "
	<tr>
		<td align='right'>
		<select id='pagesite' name='pagesize' size=1 onchange='setPageSize(this.form)'>
			<option value='0,0' selected>{$lang[$lang_id][40]}</option>";

foreach ($PAGE_SIZE_LIST as $index => $page_values) {
	echo "\n\t\t\t<option value='{$page_values[1]},{$page_values[2]}'>{$page_values[0]}</option>";
}

echo "
		</select>
		</td>
		<td>&nbsp;</td>
	</tr>\n";
?>
<script language="javascript">
window.onload = function ()
{
	elem = document.getElementById('pagesite');
	if (document.menueForm.geometry_l.value == 0
	 && document.menueForm.geometry_t.value == 0
	 && document.menueForm.geometry_x.value == 0
	 && document.menueForm.geometry_y.value == 0 )
	{
		options = elem.options;
		console.log(options);
		for(var i=0; i<=options.length; i++)
		{
			console.log(options[i]);
			if (options[i].text == 'A4') {
				options[i].selected = 'selected';
				elem.onchange();
				break;
			}
		}
	}
	paint_area();
}
</script>
<?php

////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<th colspan='2'>".$lang[$lang_id][9]."</th>
	</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][10]."&nbsp;
			<SELECT name='format' size='1'>
				<option value='jpg' "; if($format=="jpg") echo "selected"; echo ">".$lang[$lang_id][11]."
				<option value='pnm' "; if($format=="pnm") echo "selected"; echo ">".$lang[$lang_id][12]."
				<option value='tif' "; if($format=="tif") echo "selected"; echo ">".$lang[$lang_id][13]; 
if($do_pdf == 1) {
	echo "				<option value='pdf' "; if($format=="pdf") echo "selected"; echo ">".$lang[$lang_id][43];
}
echo "
			</SELECT>
		</td>\n";


//jdw:
if ($do_negative) {
	$checked="";
	if($negative=="yes") $checked="checked";
		echo "<td align='right'>".$lang[$lang_id][20]."&nbsp;<INPUT type='checkbox' name='negative' value='yes' ".$checked."></td>\n";
} else {
	echo "<td>&nbsp;</td>\n";
}
echo "</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][14]."&nbsp;
		".html_selectbox('mode',$mode_list,$mode)."
		</td>\n";
//			<SELECT name='mode' size='1'>
//				<option value='Color'  "; if ($mode=='Color')  echo "selected"; echo ">".$lang[$lang_id][15]."
//				<option value='Gray'   "; if ($mode=='Gray')   echo "selected"; echo ">".$lang[$lang_id][16]."
//				<option value='Lineart' "; if ($mode=='Lineart') echo "selected"; echo ">".$lang[$lang_id][17]."
//			</SELECT>
//		</td>\n";

// jdw:
if ($do_quality_cal) {
	$checked1="";
	if($quality_cal=="yes") $checked1="checked";
		echo "<td align='right'>".$lang[$lang_id][21]."&nbsp;<INPUT type='checkbox' name='quality_cal' value='yes' ".$checked1."></td>\n";
} else {
	echo "<td>&nbsp;</td>\n";
}
echo "</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td align='right'>".$lang[$lang_id][18]."&nbsp;
		".html_selectbox('resolution',$resolution_list,$resolution)."
		</td>\n";

// jdw:
if ($do_brightness) {
	echo "\t\t<td align='right'>".$lang[$lang_id][22]."&nbsp;<INPUT type='text' value='".$brightness."' name='brightness' size='5' maxlength='5'></td>\n";
} else {
	echo "\t\t<td>&nbsp;</td>\n";
}
echo "\t</tr>\n";


////////////////////////////////////////////////////////////////////////
// jdw:
if ($do_usr_opt) {
echo "
	<tr>
		<td colspan='2' align='center'>".$lang[$lang_id][38]."&nbsp;<INPUT type='text' value='".$usr_opt."' name='usr_opt' size='40'></td>
	</tr>\n";
}

if (isset($_POST['nazwa'])) {
	$plik_nazwa=$_POST['nazwa'];
} else {
	$plik_nazwa=time();
}
echo "
	<tr>
		<td colspan='2' align='center'>".$lang[$lang_id][41]."&nbsp;<INPUT type='text' value='".$plik_nazwa."' name='nazwa' size='40'></td>
	</tr>\n";


////////////////////////////////////////////////////////////////////////
echo "
	<tr>
		<td colspan='2' align='center' style='white-space: normal;'>
		<INPUT type='submit' name='action' value='".$lang[$lang_id][24]."'> &nbsp;
		<INPUT type='submit' name='action' value='".$lang[$lang_id][27]."'>\n";
if ($do_ocr) {
	echo "&nbsp;
		<INPUT type='submit' name='action' value='".$lang[$lang_id][26]."'>\n";
}
echo "&nbsp;
		<span style='white-space: nowrap;'>
			<INPUT type='submit' name='action' value=' ".$lang[$lang_id][25]."'> &nbsp;
			<INPUT type='submit' name='action' value='".$lang[$lang_id][28]."'>
		</span>
		</td>
	</tr>\n";


////////////////////////////////////////////////////////////////////////
if (1) {
echo "
	<tr>
		<td colspan='2'><IMG src='./bilder/clear.gif' width='1' style='height: 0.0em;' align='middle' border='0'></td>
	</tr>\n";
}


echo "
	<tr>
		<td colspan='2' align='center'>
		<input type='button' value='".$lang[$lang_id][37]."' onclick=\"window.open('./help_{$lang_id}.php', 'help', '');\">
	</tr>
</table>\n";

?>

