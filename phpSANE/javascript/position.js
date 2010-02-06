var ie = (document.all) ? true : false;

if(!ie) document.captureEvents(Event.MOUSEMOVE);
document.Preview.onclick = getclickPosXY
document.Preview.onmousemove = getPosXY;
var x = 0;
var y = 0;
var left_x = "<?php echo $position_left; ?>";
var top_y = "<?php echo $position_top; ?>";
var facktor = "<?php echo $facktor; ?>";

function getclickPosXY(e) {
    x = (ie) ? event.clientX + document.body.scrollLeft : e.pageX;
    y = (ie) ? event.clientY + document.body.scrollTop  : e.pageY; 
    if(x < 0) { x = 0; }
    if(y < 0) { y = 0; }  
    x = x - left_x;
    y = y - top_y;
    x = Math.round(x * facktor);
    y = Math.round(y * facktor);
    setPreview(x,y)
    return true;
}

function getPosXY(e) {
    x = (ie) ? event.clientX + document.body.scrollLeft : e.pageX;
    y = (ie) ? event.clientY + document.body.scrollTop  : e.pageY; 

    if(x < 0) { x = 0; }
    if(y < 0) { y = 0; }  
    x = x - left_x;
    y = y - top_y;
    x = Math.round(x * facktor);
    y = Math.round(y * facktor);
    document.menueForm.PosX.value = x;
    document.menueForm.PosY.value = y;
    return true;
}

function setPreview(x,y) {
if(document.menueForm.ecke[1].checked) {
var newL = document.menueForm.geometry_l.value;
var newT = document.menueForm.geometry_t.value;
var newX = x - newL;
var newY = y - newT;
setGeometry(newL,newT,newX,newY);
document.menueForm.ecke[0].checked = true;
document.getElementById("ecke_rot1").style.color = "red";
document.getElementById("ecke_rot2").style.color = "black";
}
else {
var newL = x;
var newT = y;
var newX = document.menueForm.geometry_x.value;
var newY = document.menueForm.geometry_y.value;
setGeometry(newL,newT,newX,newY);
document.menueForm.ecke[1].checked = true;
document.getElementById("ecke_rot1").style.color = "black";
document.getElementById("ecke_rot2").style.color = "red";
}
    return true;
}

function setGeometry(l,t,x,y) {
document.menueForm.geometry_l.value = l;
document.menueForm.geometry_t.value = t;
document.menueForm.geometry_x.value = x;
document.menueForm.geometry_y.value = y;
}