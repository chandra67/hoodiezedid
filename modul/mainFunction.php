<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
function connect(){
    
    error_reporting(0);
    session_start();

    $server   = "localhost";
    $username = "root";
    $password = "bmwe46coupe";
    $database = "rhex_hoodiezed";

    // Koneksi dan memilih database di server
    mysql_connect($server,$username,$password) or die("Koneksi gagal");
    mysql_select_db($database) or die("Database tidak bisa dibuka");
}

function signOut(){
        if($_SESSION['signed_in'] == true){
            $_SESSION['signed_in'] = NULL;
            $_SESSION['idUser'] = NULL;
            $_SESSION['userCat'] = NULL;
            echo "<script>document.location = 'signin.php';</script>";
        }
        else{
            echo "<script>alert(\"You are not logged in!\");document.location = 'signin.php';</script>";
        }
    }
function signOutAdmin(){
        if($_SESSION['signed_in'] == true){
            $_SESSION['signed_in'] = NULL;
            $_SESSION['idUser'] = NULL;
            $_SESSION['userCat'] = NULL;
            echo "<script>document.location = 'index.php';</script>";
        }
        else{
            echo "<script>alert(\"You are not logged in!\");document.location = 'index.php';</script>";
        }
    }

 function cekLogin(){
        if($_SESSION['signed_in'] != true){
            echo "<script>alert(\"Forbidden Access! You are not logged in!\");document.location = '../signin.php';</script>";
        }
    }
 function cekLoginAdmin(){
        if($_SESSION['signed_in'] != true){
            echo "<script>alert(\"Forbidden Access! You are not logged in!\");document.location = 'index.php';</script>";
        }
    }
function selectAdmin(){
        $sql = "SELECT name, email FROM user WHERE userCat = 'admin' LIMIT 1";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        
        $admin = array();
        $admin[0] = $r['name'];
        $admin[1] = $r['email'];
        return $admin;
}

 function cekTabGallery($tab){
	if($tab=='gallery'){
		echo "<script type=\"text/javascript\">
  				aktifTabGallery('gallery');
   				showKontenGallery('gallery-konten');
			</script>";
	}elseif($tab=='addpicture'){
		echo "<script type=\"text/javascript\">
  				aktifTabGallery('addpicture');
   				showKontenGallery('addpicture-konten');
			</script>";
	}elseif($tab=='addvideo'){
		echo "<script type=\"text/javascript\">
  				aktifTabGallery('addvideo');
   				showKontenGallery('addvideo-konten');
			</script>";
	}else{
		echo "<script type=\"text/javascript\">
  				aktifTabGallery('gallery');
   				showKontenGallery('gallery-konten');
			</script>";
	}
}
function cekTabProduct($tab){
	if($tab=='product'){
		echo "<script type=\"text/javascript\">
  				aktifTabProduct('product');
   				showKontenProduct('product-konten');
			</script>";
	}elseif($tab=='addnew'){
		echo "<script type=\"text/javascript\">
  				aktifTabProduct('addnew');
   				showKontenProduct('addnew-konten');
			</script>";
	}else{
		echo "<script type=\"text/javascript\">
  				aktifTabProduct('product');
   				showKontenProduct('product-konten');
			</script>";
	}
}

function cekTabCustomer($tab){
  if($tab=='customer'){
    echo "<script type=\"text/javascript\">
          aktifTabCustomer('customer');
          showKontenCustomer('customer-konten');
      </script>";
  }elseif($tab=='newsletter'){
    echo "<script type=\"text/javascript\">
          aktifTabCustomer('newsletter');
          showKontenCustomer('newsletter-konten');
      </script>";
  }else{
    echo "<script type=\"text/javascript\">
          aktifTabCustomer('customer');
          showKontenCustomer('customer-konten');
      </script>";
  }
}

function cekTabArtist($tab){
  if($tab=='product'){
    echo "<script type=\"text/javascript\">
          aktifTabArtist('product');
          showKontenArtist('product-konten');
      </script>";
  }elseif($tab=='addnew'){
    echo "<script type=\"text/javascript\">
          aktifTabArtist('addnew');
          showKontenArtist('addnew-konten');
      </script>";
  }elseif($tab=='featured'){
    echo "<script type=\"text/javascript\">
          aktifTabArtist('featured');
          showKontenArtist('featured-konten');
      </script>";
  }else{
    echo "<script type=\"text/javascript\">
          aktifTabArtist('product');
          showKontenArtist('product-konten');
      </script>";
  }
}


function cekTabSales($tab){
  if($tab=='sales'){
    echo "<script type=\"text/javascript\">
          aktifTabSales('sales');
          showKontenSales('sales-konten');
      </script>";
  }elseif($tab=='confirmation'){
    echo "<script type=\"text/javascript\">
          aktifTabSales('confirmation');
          showKontenSales('confirmation-konten');
      </script>";
  }elseif($tab=='notification'){
    echo "<script type=\"text/javascript\">
          aktifTabSales('notification');
          showKontenSales('notification-konten');
      </script>";
  }elseif($tab=='shipping'){
    echo "<script type=\"text/javascript\">
          aktifTabSales('shipping');
          showKontenSales('shipping-konten');
      </script>";
  }else{
    echo "<script type=\"text/javascript\">
          aktifTabSales('sales');
          showKontenSales('sales-konten');
      </script>";
  }
}

function cekTabDictionary($tab){
	if($tab=='words'){
		echo "<script type=\"text/javascript\">
  				aktifTabDictionary('words');
   				showKontenDictionary('words-konten');
			</script>";
	}elseif($tab=='addnew'){
		echo "<script type=\"text/javascript\">
  				aktifTabDictionary('addnew');
   				showKontenDictionary('addnew-konten');
			</script>";
	}else{
		echo "<script type=\"text/javascript\">
  				aktifTabDictionary('words');
   				showKontenDictionary('words-konten');
			</script>";
	}
}
function cekTabNews($tab){
	if($tab=='news'){
		echo "<script type=\"text/javascript\">
  				aktifTabNews('news');
   				showKontenNews('news-konten');
			</script>";
	}elseif($tab=='addnew'){
		echo "<script type=\"text/javascript\">
  				aktifTabNews('addnew');
   				showKontenNews('addnew-konten');
			</script>";
	}else{
		echo "<script type=\"text/javascript\">
  				aktifTabNews('news');
   				showKontenNews('news-konten');
			</script>";
	}
}
function cekTabGuide($tab){
	if($tab=='hero'){
		echo "<script type=\"text/javascript\">
  				aktifTabGuide('hero');
   				showKontenGuide('hero-konten');
			</script>";
	}elseif($tab=='addnew'){
		echo "<script type=\"text/javascript\">
  				aktifTabGuide('addnew');
   				showKontenGuide('addnew-konten');
			</script>";
	}else{
		echo "<script type=\"text/javascript\">
  				aktifTabGuide('hero');
   				showKontenGuide('hero-konten');
			</script>";
	}
}
function cekTabOther($tab){
	if($tab=='site_information'){
		echo "<script type=\"text/javascript\">
  				aktifTabOther('site_information');
   				showKontenOther('site_information-konten');
			</script>";
	}elseif($tab=='about'){
		echo "<script type=\"text/javascript\">
  				aktifTabOther('about');
   				showKontenOther('about-konten');
			</script>";
	}elseif($tab=='contact'){
		echo "<script type=\"text/javascript\">
  				aktifTabOther('contact');
   				showKontenOther('contact-konten');
			</script>";
	}elseif($tab=='faq'){
    echo "<script type=\"text/javascript\">
          aktifTabOther('faq');
          showKontenOther('faq-konten');
      </script>";
  }else{
		echo "<script type=\"text/javascript\">
  				aktifTabOther('site_information');
   				showKontenOther('site_information-konten');
			</script>";
	}
}

function setSiteInformation(){
    $sql = "SELECT * FROM site_information";
    $hasil = mysql_query($sql);
    $return = array();
    while($r=mysql_fetch_array($hasil)){
        $return[0] = $r['tittle'];
        $return[1] = $r['meta_keyword'];
        $return[2] = $r['meta_description'];
    }
    return $return;
}
function updateSiteInformation(){
    $sql = "UPDATE site_information SET tittle='$_POST[title]', meta_keyword='$_POST[key]', meta_description='$_POST[desc]' WHERE no=1";
    $runsql = mysql_query($sql);
    if($runsql) {
            echo "<script>alert(\"Site Information Updated!\");document.location = '../other.php?tab=site_information';</script>";
    }else{
            echo "<script>alert(\"Update Failed!\");document.location = '../other.php?tab=site_information';</script>";
    }
}

function updateAboutPicture(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
				$target = "../../images/".$filename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
                                        echo "error move";
				}else{ 
                                    $sql = "UPDATE about SET image='".$filename."' WHERE id=1";
                                    $runsql = mysql_query($sql);
                                    if(!$runsql) {
                                            echo "error update picture";
                                    }
				}
		}
            }
    }

function updateAbout(){
        $sql = "UPDATE about SET text='".$_POST['text']."' WHERE id=1";
        $runsql = mysql_query($sql);
        if($runsql) {
                echo "<script>alert(\"About Page Updated!\");document.location = '../other.php?tab=about';</script>";
        }else{
                echo "<script>alert(\"Update Failed!\");document.location = '../other.php?tab=about';</script>";
        }
}
function updateNewsFeed(){
        $sql = "UPDATE about SET text='".$_POST['text']."' WHERE id=2";
        $runsql = mysql_query($sql);
        if($runsql) {
                echo "<script>alert(\"News Feed Updated!\");document.location = '../other.php?tab=newsfeed';</script>";
        }else{
                echo "<script>alert(\"Update Failed!\");document.location = '../other.php?tab=newsfeed';</script>";
        }
}
function updateContact(){
        $sql = "UPDATE contact SET form_text='".$_POST['judul']."', email_2='".$_POST['email']."', other_contact='".$_POST['other']."', facebook='".$_POST['fb']."', twitter='".$_POST['tw']."'  WHERE id=1";
        $runsql = mysql_query($sql);
        if($runsql) {
                echo "<script>alert(\"Contact Page Updated!\");document.location = '../other.php?tab=contact';</script>";
        }else{
                echo "<script>alert(\"Update Failed!\");document.location = '../other.php?tab=contact';</script>";
        }
}
function addVisitor($tipe, $page){
        $sql = "INSERT INTO visitorcounter(tipeVisitor, dateVisitor, page) VALUES ('$tipe', CURDATE(), '$page')";
	mysql_query($sql);
    }
function countVisitor($tipe){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM visitorcounter WHERE tipeVisitor='$tipe'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
 function countPage($page){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM visitorCounter WHERE page='$page'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
  function countUser(){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM user WHERE userCat='client'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
    
    function countGallery(){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM gallery";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
    function countComment(){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM comment";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
    function countConsult(){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM consult";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
    function countProduct(){
         //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM package";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }