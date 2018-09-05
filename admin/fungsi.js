function showHiddenForm(idbox){
		
		document.getElementById(idbox).style.height= "auto";
		document.getElementById(idbox).style.paddingBottom= "30px";


	}


function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
var d=today.getDay();
var mo=today.getMonth();
var y=today.getYear();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('time').innerHTML=h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}

function nonAktifTab(idbox){
		document.getElementById(idbox).style.backgroundColor="";
		document.getElementById(idbox).style.color="";
		document.getElementById(idbox).style.borderBottom="";
	}
function hide(boxid){
		document.getElementById(boxid).style.visibility="hidden";
		document.getElementById(boxid).style.position="fixed";
	}
	
	//untuk halaman media/gallery
var tabGallery=new Array("gallery","addpicture","addvideo");
var KontenGallery=new Array("gallery-konten","addpicture-konten","addvideo-konten");
	
function aktifTabGallery(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<3; i++)
		{
			if(setTabId != tabGallery[i]){
				nonAktifTab(tabGallery[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenGallery(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<3; i++)
		{
			if(setKontenId != KontenGallery[i]){
				hide(KontenGallery[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//
	

	//untuk halaman produk
var tabProduct=new Array("product","addnew");
var KontenProduct=new Array("product-konten","addnew-konten");
	
function aktifTabProduct(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<2; i++)
		{
			if(setTabId != tabProduct[i]){
				nonAktifTab(tabProduct[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenProduct(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<2; i++)
		{
			if(setKontenId != KontenProduct[i]){
				hide(KontenProduct[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//


	//untuk halaman produk
var tabCustomer=new Array("customer","newsletter");
var KontenCustomer=new Array("customer-konten","newsletter-konten");
	
function aktifTabCustomer(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<2; i++)
		{
			if(setTabId != tabCustomer[i]){
				nonAktifTab(tabCustomer[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenCustomer(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<2; i++)
		{
			if(setKontenId != KontenCustomer[i]){
				hide(KontenCustomer[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//

var tabArtist=new Array("product","addnew", "featured");
var KontenArtist=new Array("product-konten","addnew-konten","featured-konten");
	
function aktifTabArtist(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<3; i++)
		{
			if(setTabId != tabArtist[i]){
				nonAktifTab(tabArtist[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenArtist(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<3; i++)
		{
			if(setKontenId != KontenArtist[i]){
				hide(KontenArtist[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//
        
        //untuk halaman dictionary
var tabDictionary=new Array("words","addnew");
var KontenDictionary=new Array("words-konten","addnew-konten");
	
function aktifTabDictionary(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<2; i++)
		{
			if(setTabId != tabDictionary[i]){
				nonAktifTab(tabDictionary[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenDictionary(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<2; i++)
		{
			if(setKontenId != KontenDictionary[i]){
				hide(KontenDictionary[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//
        
   //untuk halaman news
var tabNews=new Array("news","addnew");
var KontenNews=new Array("news-konten","addnew-konten");
	
function aktifTabNews(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<2; i++)
		{
			if(setTabId != tabNews[i]){
				nonAktifTab(tabNews[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenNews(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<2; i++)
		{
			if(setKontenId != KontenNews[i]){
				hide(KontenNews[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//
        
        //untuk halaman guide
var tabGuide=new Array("hero","addnew");
var KontenGuide=new Array("hero-konten","addnew-konten");
	
function aktifTabGuide(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<2; i++)
		{
			if(setTabId != tabGuide[i]){
				nonAktifTab(tabGuide[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenGuide(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<2; i++)
		{
			if(setKontenId != KontenGuide[i]){
				hide(KontenGuide[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//
	
//untuk halaman produk
var tabOther=new Array("site_information","contact", "faq");
var KontenOther=new Array("site_information-konten","contact-konten","faq-konten");
	
function aktifTabOther(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<3; i++)
		{
			if(setTabId != tabOther[i]){
				nonAktifTab(tabOther[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenOther(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<3; i++)
		{
			if(setKontenId != KontenOther[i]){
				hide(KontenOther[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//

	//untuk halaman pages
var tabPages=new Array("about","run", "char", "cos" );
var KontenPages=new Array("about-konten","run-konten","char-konten","cos-konten");
	
function aktifTabPages(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<4; i++)
		{
			if(setTabId != tabPages[i]){
				nonAktifTab(tabPages[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenPages(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<4; i++)
		{
			if(setKontenId != KontenPages[i]){
				hide(KontenPages[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//

//untuk halaman login
function validateAddLogin()
	{
		 
		var password1=document.forms["AddLogin"]["password1"].value;
                var password2=document.forms["AddLogin"]["password2"].value;
		
		
		
	//validasi password dan confirm password
		if(password1!=password2)
		{
                                alert("Password dan Ulangi Password tidak sama!");
                                return false;
		}
	
		 
		 
	}
//
function validateChangePass()
{
	var password=document.forms["changePass"]["new1"].value;
	var password2=document.forms["changePass"]["new2"].value;
	var old=document.forms["changePass"]["old"].value;
	
	if (password==null || password=="")
		  {
		  alert("Password Baru harus diisi!");
		  return false;
		  }
	if (password2==null || password2=="")
		  {
		  alert("Ulangi Password Baru harus diisi!");
		  return false;
		  }
	if (password != password2)
		  {
		  alert("Password Baru dan Ulangi Password Baru tidak sama!");
		  return false;
		  }	
	if (old==null || old=="")
		  {
		  alert("Password Lama harus diisi!");
		  return false;
		  }
}

var tabSales=new Array("sales","confirmation", "notification", "shipping");
var KontenSales=new Array("sales-konten","confirmation-konten","notification-konten","shipping-konten");
	
function aktifTabSales(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<4; i++)
		{
			if(setTabId != tabSales[i]){
				nonAktifTab(tabSales[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#c58b00";
		document.getElementById(idbox).style.borderBottom="thin solid #c58b00";
	}
		
function showKontenSales(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<4; i++)
		{
			if(setKontenId != KontenSales[i]){
				hide(KontenSales[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//


	      //untuk halaman hotel managemen
var tabHotel=new Array("information","facilities","room","gallery");
var KontenHotel=new Array("information-konten","facilities-konten","room-konten","gallery-konten");
	
function aktifTabHotel(idbox){
		var setTabId = document.getElementById('idbox');
	
		for (i=0; i<4; i++)
		{
			if(setTabId != tabHotel[i]){
				nonAktifTab(tabHotel[i]);
			}
		}
		
		document.getElementById(idbox).style.backgroundColor="#eeeeee";
		document.getElementById(idbox).style.color="#383838";
		document.getElementById(idbox).style.borderBottom="thin solid #eeeeee";
	}
		
function showKontenHotel(boxid){
		var setKontenId = document.getElementById('boxid');
	
		for (i=0; i<5; i++)
		{
			if(setKontenId != KontenHotel[i]){
				hide(KontenHotel[i]);
			}
		}
		document.getElementById(boxid).style.position="relative";
		document.getElementById(boxid).style.visibility="visible";
	}
	//

function validateGenrePermalink()
{
	 var nameRegex =  /^[a-z]+$/;
    var validUsername = document.forms['addGenre']['genrePermalink'].value.match(nameRegex);
    if(validUsername == null){
        alert("Permalink is not valid. Only characters a-z are acceptable. Do not use space, symbol, number, and uppercase character.");
        document.forms['addGenre']['genrePermalink'].focus();
        return false;
    }

}
function validatePlatformPermalink()
{
	 var nameRegex =  /^[a-z]+$/;
    var validUsername = document.forms['platform']['platformPermalink'].value.match(nameRegex);
    if(validUsername == null){
        alert("Permalink is not valid. Only characters a-z are acceptable. Do not use space, symbol, number, and uppercase character.");
        document.forms['platform']['platformPermalink'].focus();
        return false;
    }

}

function validateGamesPermalink()
{
	 var nameRegex =  /^[a-z]+$/;
    var validUsername = document.forms['games']['gamePermalink'].value.match(nameRegex);
    if(validUsername == null){
        alert("Permalink is not valid. Only characters a-z are acceptable. Do not use space, symbol, number, and uppercase character.");
        document.forms['games']['gamePermalink'].focus();
        return false;
    }

}

function validateCollectionPermalink()
{
	 var nameRegex =  /^[a-z]+$/;
    var validUsername = document.forms['collection']['idCollection'].value.match(nameRegex);
    if(validUsername == null){
        alert("Permalink is not valid. Only characters a-z are acceptable. Do not use space, symbol, number, and uppercase character.");
        document.forms['collection']['idCollection'].focus();
        return false;
    }

}