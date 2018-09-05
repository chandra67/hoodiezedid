<?php
	include "../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        include "../modul/userModule.php";
         include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    include '../modul/artistModule.php';
        
        $user = new user();
        $user->idUser = $_SESSION['idUser'];

        $user->setVar();
        
	global $current;
	$current ='Product';
	include "header.php";
        
	if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
      <div class="sub-head-content">

        <?php
                if(isset($_GET['edit']) and $tab == 'product'){
                    ?>
                        <p><a href="dashboard.php"><img src="images/home-grey.png" /></a> <img src="images/v.png" /> <a href="product.php">Product</a> <img src="images/v.png" /> <a href="##">Edit Product Information</a> </p>
                    <?php
                }elseif(isset($_GET['stock']) and $tab == 'product'){
                    ?>
                        <p><a href="dashboard.php"><img src="images/home-grey.png" /></a> <img src="images/v.png" /> <a href="product.php">Product</a> <img src="images/v.png" /> <a href="##">Manage Stock</a> </p>
                    <?php
                }elseif(isset($_GET['pictures']) and $tab == 'product'){
                    ?>
                        <p><a href="dashboard.php"><img src="images/home-grey.png" /></a> <img src="images/v.png" /> <a href="product.php">Product</a> <img src="images/v.png" /> <a href="##">Manage Pictures</a> </p>
                    <?php
                }else{
                    ?>
                        <p><a href="dashboard.php"><img src="images/home-grey.png" /></a> <img src="images/v.png" /> <a href="product.php">Product</a> </p>
                    <?php
                }
            ?>
                
                 
              
      
    </div>
	
     <div class="tab-konten-con">
    	<div class="tab-konten-visible" id="product-konten" style="overflow: auto;">
        	<?php
				if(isset($_GET['edit']) and $tab == 'product'){
					include "product/edit-product.php";
				}elseif(isset($_GET['stock']) and $tab == 'product'){
                                        include "product/manage-stock.php";
                

                }elseif(isset($_GET['pictures']) and $tab == 'product'){
                                        include "product/edit-pictures.php";
                

                }else{
					include "product/product-view.php";
				}
			?>
        </div>
       
        <div class="tab-menu-bot"></div>
    </div>
  
</div>
<?php
	include "footer.php";
?>