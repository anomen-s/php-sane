
function paint_area() {
	var L=4+2*parseInt(document.menueForm.geometry_l.value);
	var T=4+2*parseInt(document.menueForm.geometry_t.value);
	var x=2*parseInt(document.menueForm.geometry_x.value);
	var y=2*parseInt(document.menueForm.geometry_y.value);
	
	area1=document.getElementById("scan_area1");
	area2=document.getElementById("scan_area2");
	area3=document.getElementById("scan_area3");
	area4=document.getElementById("scan_area4");
	
	area1.style.left=L+'px';
	area1.style.top=-(601-T)+'px';
	area1.style.width=0;
	area1.style.height=y+'px';
	
	area2.style.left=L+'px';
	area2.style.top=-(602-T)+'px';
	area2.style.width=x+'px';
	area2.style.height=0;
	
	area3.style.left=L+x+'px';
	area3.style.top=-(y+605-T)+'px';
	area3.style.width=0;
	area3.style.height=y+'px';
	
	area4.style.left=L+'px';
	area4.style.top=-(y+y+608-T)+'px';
	area4.style.width=x+'px';
	area4.style.height=0;
}

