function hide(boxid){
		document.getElementById(boxid).style.visibility="hidden";
		document.getElementById(boxid).style.position="fixed";
	}
function showImage(boxid, max){
		var aktifImageId = document.getElementById('boxid');
	
		for (i=0; i<max; i++)
		{
			if(aktifImageId != imageIdArray[i]){
				hide(imageIdArray[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
function showOneImage(boxid){
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
}
function showBox(boxid){
		document.getElementById(boxid).style.position="fixed";
		document.getElementById(boxid).style.visibility="visible";
	}
