<?php
	include "../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        include "../modul/userModule.php";
        include '../modul/siteSettingModule.php';
        
        $user = new user();
        $user->idUser = $_SESSION['idUser'];

        $user->setVar();
        
	global $current;
	$current ='Settings';
	include "header.php";
        
	if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu" id="site_information" onClick="aktifTabOther('site_information');showKontenOther('site_information-konten');">Site Information</div>
        <div class="tab-menu" id="contact" onClick="aktifTabOther('contact');showKontenOther('contact-konten');">Social & Contact</div>
        <div class="tab-menu" id="faq" onClick="aktifTabOther('faq');showKontenOther('faq-konten');">FAQ</div>
        <div class="tab-menu-bot"></div>
    </div>
     <div class="tab-konten-con">
    	<div class="tab-konten" id="site_information-konten">
        	<?php
                            include "other/site_information.php";
			?>
        </div>
       
         <div class="tab-konten" id="contact-konten">
        	<?php
				
			include "other/contact.php";
                        ?>
        </div>
      
        <div class="tab-konten" id="faq-konten">
            <?php
                            include "other/edit-faq.php";
            ?>
        </div>
        <div class="tab-menu-bot"></div>
    </div>
     <?php
		  cekTabOther($tab);
	?>
</div>
<?php
	include "footer.php";
?>