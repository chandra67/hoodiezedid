<?php
	include "../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        include "../modul/userModule.php";
         include '../modul/artistModule.php';
    include '../modul/imageModule.php';
    include '../modul/siteSettingModule.php';
        
        $user = new user();
        $user->idUser = $_SESSION['idUser'];

        $user->setVar();
        
	global $current;
	$current ='Artist';
	include "header.php";
        
	if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu" id="product" onClick="aktifTabArtist('product');showKontenArtist('product-konten');">Artist</div>
        <div class="tab-menu" id="addnew" onClick="aktifTabArtist('addnew');showKontenArtist('addnew-konten');">Add Artist</div>
        <div class="tab-menu" id="featured" onClick="aktifTabArtist('featured');showKontenArtist('featured-konten');">Featured Artist</div>
        <div class="tab-menu-bot"></div>
    </div>
     <div class="tab-konten-con">
    	<div class="tab-konten" id="product-konten">
        	<?php
				if(isset($_GET['edit']) and $tab == 'artist'){
					include "artist/edit-artist.php";
				}elseif(isset($_GET['pictures']) and $tab == 'artist'){
                    include "artist/edit-pictures.php";
                }else{
					include "artist/artist-view.php";
				}
			?>
        </div>
        <div class="tab-konten" id="addnew-konten">
        	<?php
                    include "artist/add-new-artist.php";      
			?>
        </div>
         <div class="tab-konten" id="featured-konten">
            <?php
                    include "artist/edit-featured.php";      
            ?>
        </div>
        <div class="tab-menu-bot"></div>
    </div>
     <?php
		  cekTabArtist($tab);
	?>
</div>
<?php
	include "footer.php";
?>