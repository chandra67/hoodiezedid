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
function showDialogBox(boxid){
		document.getElementById(boxid).style.visibility="visible";
}
function HideLabel(txtField){
			if(txtField.name=='search'){
				if(txtField.value=='Find artists, products, and more')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowLabel(txtField){
			if(txtField.name=='search'){
				if(txtField.value.trim()==''){
					txtField.value = 'Find artists, products, and more';
				}
			}
		}
function HideLabel2(txtField){
			if(txtField.name=='customerEmail'){
				if(txtField.value=='Your email')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowLabel2(txtField){
			if(txtField.name=='customerEmail'){
				if(txtField.value.trim()==''){
					txtField.value = 'Your email';
				}
			}
		}

function HideYourname(txtField){
			if(txtField.name=='nama'){
				if(txtField.value=='YOUR NAME')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowYourname(txtField){
			if(txtField.name=='nama'){
				if(txtField.value.trim()==''){
					txtField.value = 'YOUR NAME';
				}
			}
		}
function HideYouremail(txtField){
			if(txtField.name=='email'){
				if(txtField.value=='YOUR EMAIL')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowYouremail(txtField){
			if(txtField.name=='email'){
				if(txtField.value.trim()==''){
					txtField.value = 'YOUR EMAIL';
				}
			}
		}
function HideYourphone(txtField){
			if(txtField.name=='phone'){
				if(txtField.value=='YOUR PHONE NUMBER')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowYourphone(txtField){
			if(txtField.name=='phone'){
				if(txtField.value.trim()==''){
					txtField.value = 'YOUR PHONE NUMBER';
				}
			}
		}
function HideYourmessage(txtField){
			if(txtField.name=='message'){
				if(txtField.value=='YOUR MESSAGE')
					txtField.value = '';
				else
					txtField.select();
			}
		}
function ShowYourmessage(txtField){
			if(txtField.name=='message'){
				if(txtField.value.trim()==''){
					txtField.value = 'YOUR MESSAGE';
				}
			}
		}

function validateSignUpForm2()
{
    var x=document.forms["SignUp2"]["customerEmail"].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
      {
      alert("Email address is not valid!");
      return false;
      }

    var password=document.forms["SignUp2"]["customerPassword"].value;
    var password2=document.forms["SignUp2"]["customerPassword2"].value;
    
    if (password==null || password=="")
		  {
		  alert("Please type a password!");
		  return false;
		  }
    if (password2==null || password2=="")
		  {
		  alert("Please type confirm password!");
		  return false;
		  }
    if (password != password2)
		  {
		  alert("Password and Confirm Password doesnt match!");
		  return false;
		  }
}
function validateChangePass()
{
    var password=document.forms["changePass"]["new1"].value;
    var password2=document.forms["changePass"]["new2"].value;
    
    if (password==null || password=="")
		  {
		  alert("Please type new password!");
		  return false;
		  }
    if (password2==null || password2=="")
		  {
		  alert("Please retype new password!");
		  return false;
		  }
    if (password != password2)
		  {
		  alert("New Password and Retype New Password doesnt match!");
		  return false;
		  }
}

function validateContactMessage()
{
    var nama=document.forms["contact"]["nama"].value;
    var email=document.forms["contact"]["email"].value;
    var phone=document.forms["contact"]["phone"].value;
    var message=document.forms["contact"]["message"].value;
    
    if (nama=="YOUR NAME")
		  {
		  alert("Please type your name!");
		  return false;
		  }
     if (email=="YOUR EMAIL")
		  {
		  alert("Please type your email!");
		  return false;
		  }
		   if (phone=="YOUR PHONE NUMBER")
		  {
		  alert("Please type your phone number!");
		  return false;
		  }
		   if (message=="YOUR MESSAGE")
		  {
		  alert("Please type your message!");
		  return false;
		  }
}

function validateAddCart()
{
    var nama=document.forms["addcart"]["idStock"].value;
    
    if (nama=='-')
		  {
		  alert("Please choose your size!");
		  return false;
		  }
   
}

function getImageWidth(imageid, boxid)
{
	var img = document.getElementById(imageid); 

	var tinggi = img.clientHeight;
	var lebar = img.clientWidth;

	document.getElementById(boxid).style.width=lebar+60;
	document.getElementById(boxid).style.marginLeft= lebar/2 - lebar;
}
function showDropDown(){
		document.getElementById('dropdown').style.visibility="visible";
		document.getElementById('hover').style.color="#f5c501";
		document.getElementById('hover').style.backgroundColor="#372f2d";
}
function hideDropDown(){
		document.getElementById('dropdown').style.visibility="hidden";
		document.getElementById('hover').style.color="";
		document.getElementById('hover').style.backgroundColor="";
}