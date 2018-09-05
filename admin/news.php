<?php
	include "../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        include "../modul/userModule.php";
        include '../modul/newsModule.php';
        include '../modul/commentModule.php';
        
        $user = new user();
        $user->idUser = $_SESSION['idUser'];

        $user->setVar();
        
	global $current;
	$current ='News';
	include "header.php";
        
	if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
        
       
?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu" id="news" onClick="aktifTabNews('news');showKontenNews('news-konten');">News</div>
        <div class="tab-menu" id="addnew" onClick="aktifTabNews('addnew');showKontenNews('addnew-konten');">Add News</div>
        <div class="tab-menu-bot"></div>
    </div>
     <div class="tab-konten-con">
    	<div class="tab-konten" id="news-konten">
        	<?php
				if(isset($_GET['edit']) and $tab == 'news'){
					include "news/edit-news.php";
                                }elseif(isset($_GET['comment']) and $tab == 'news'){
                                        include "news/manage-comment.php";
                                }else{
					include "news/news-view.php";
				}
                            
				
			?>
        </div>
        <div class="tab-konten" id="addnew-konten">
        	<?php
                        if(isset($_GET['category']) and $tab == 'addnew'){
                                        include "news/manage-category.php";
                                }else{
					 include "news/add-new-news.php";
				}
                           
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