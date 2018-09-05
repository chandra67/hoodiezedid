<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
    include "../modul/imageModule.php";
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Mobile';
    include "header.php";
    
    if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu-visible">Mobile Home Picture</div>
        <div class="tab-menu-bot"></div>
    </div>
    <div class="tab-konten-con">
    	<div class="tab-konten-visible">
            	<?php
				if(isset($_GET['hover'])){
                    include "mobile-slide/add-hover.php";
                }elseif(isset($_GET['edit'])){
                    include "mobile-slide/edit-information.php";
                }else{
                    include "mobile-slide/edit-pictures.php";
                }
                                    
                                
			?>
        </div>
        <div class="tab-menu-bot"></div>
   </div>
</div>
<?php
	include "footer.php";
?>