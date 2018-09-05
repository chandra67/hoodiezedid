<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Help';
    include "header.php";
    
    if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu-visible">Help</div>
        <div class="tab-menu-bot"></div>
    </div>
    <div class="tab-konten-con">
    	<div class="tab-konten-visible">
            	<?php
				
                                    include "help/helpIndex.php";
                                
			?>
        </div>
        <div class="tab-menu-bot"></div>
   </div>
</div>
<?php
	include "footer.php";
?>