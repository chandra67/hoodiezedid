<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
     include '../modul/imageModule.php';
    include '../modul/siteSettingModule.php';
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Contest';
    include "header.php";
    
    if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu" id="news" onClick="aktifTabNews('news');showKontenNews('news-konten');">Contest</div>
        <div class="tab-menu" id="addnew" onClick="aktifTabNews('addnew');showKontenNews('addnew-konten');">Artworks</div>
        <div class="tab-menu-bot"></div>
    </div>
    <div class="tab-konten-con">
        <div class="tab-konten" id="news-konten">
            <?php
                
                    include "contest/edit-contest.php";
                                
            ?>
        </div>
        <div class="tab-konten" id="addnew-konten">
            <?php     
                include "contest/edit-pictures.php"; 
            ?>
        </div>
        <div class="tab-menu-bot"></div>
   </div>
   <?php
          cekTabNews($tab);
    ?>
</div>
<?php
	include "footer.php";
?>