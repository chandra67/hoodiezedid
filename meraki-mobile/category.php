<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='PRODUCTS';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    include '../modul/artistModule.php';
    
   $rowsPerPage = 5;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
        $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

    if(isset($_GET['category']))
    {
        $category= $_GET['category'];
    }


?>
            <div class="mobile-content">
                <?php
                include 'category-menu.php';
                ?>
            </div>
              
<?php
    $product = new product();
    $product->productType = $category;
    
    if($category=='all'){
        $productView = $product->setVarProduct($offset, $rowsPerPage);
    }else{
        if($product->cekRowsPerCat()==0){
            echo "  <div class=\"mobile-content\"><p align=center>We don't have product yet in ";
            echo $productType->printCatName($category)." category</p></div>";
        }

        $productView = $product->setVarProductPerCat($offset, $rowsPerPage);
    }
    
    $image = new image();
    $image->imageType = 'product';
    $addto = "ADD TO CART*";
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
        ?>
         <div class="mobile-content-product">
                   <img src="http://meraki.co.id/uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="100%"/>
        </div>       
        <div class="mobile-content-product-mid">
                <?php
                                 $artist= new artist();
                                $artist->idArtist =  $productView[$i]->idArtist;
                            ?>
            <p style="font-size: 5vw; width: 55%;"><b><?php echo $productView[$i]->productName; ?></b></p>
            
            
            <p style="font-size: 3vw; padding-top: 1px;padding-bottom: 5px; width: 100%;">by <b><a href="../../artist/<?php echo $artist->idArtist; ?>/<?php echo str_replace(" ", "-", $artist->viewArtistName()); ?>" class="by"><?php echo $artist->viewArtistName(); ?></a></b></p>
            <span style="font-size: 4vw; width: 75%; float: left;padding-bottom: 5px;"><?php echo $productView[$i]->productDescription; ?></span>
        
            
                            
        </div>     
        <?php
                                 $stock = new stock();
                                $stock->idProduct =  $productView[$i]->idProduct;

                               if( $productView[$i]->productAvailability == 'In Stock'){
                                            if( $stock->cekStock() == 0){
                                                $cart = "disabled";
                                                $addto = "OUT OF STOCK";
                                            }else{
                                                $addto = "ADD TO CART*";
                                                $cart = "/";
                                            }
                                        }elseif($productView[$i]->productAvailability == 'Pre Order'){
                                             if( $stock->cekStock() == 0){
                                                $cart = "disabled";
                                                $addto = "OUT OF STOCK";
                                            }else{
                                                $addto = "PRE ORDER*";
                                                $cart = "/";
                                            }
                                        }else{
                                            $cart = "disabled";
                                            $addto = "OUT OF STOCK";
                                        }

                               
                                

        ?>
        <div class="mobile-content-product-info">
              
                               
                                     <form action="../../shop/cart/?action=add&code=<?php echo $productView[$i]->idProduct; ?>" name="addcart"  enctype='multipart/form-data' method="post">
                                <div class="size">
                                    <span class="price"><b>IDR. <?php echo number_format($productView[$i]->productPrice, 0, ',', '.'); ?>,-</b></span>
                                    <input type="submit" value="<?php echo  $addto; ?>"  class="cart-submit" <?php echo  $cart; ?>>
                                </div>
                                   
                                    <input type="hidden" name="idStock" id="idStock" value="0" />
                              <?php
                                   if($productView[$i]->productType == 17){
                                    $ket = "*Choose Size First";

                                     $stockView = $stock->setVarStock();
                                    $status= 0;
   
                                    for($z = 0; $z < count($stockView); $z++){
                                        if($stockView[$z]->stockQuantity == 0){
                                            $zero = "disabled";
                                        }else{
                                            $zero = "required";
                                        }
                              ?>
                                    
                                    <div class="<?php echo $stockView[$z]->stockName; ?>">
                                        <input type="radio" id="<?php echo $stockView[$z]->idStock; ?>" value="<?php echo $stockView[$z]->idStock; ?>" name="idStock" <?php echo $zero; ?>>
                                        <label for="<?php echo $stockView[$z]->idStock; ?>"></label>
                                    </div>
                            <?php
                                }
                                   }else{
                                        $ket = "";
                                   }
                                    
                                   
                            
                            ?>
                           <input name="productQuantity" type="text" class="quantity-input" value="1" required>
                           <span style="font-size: 3vw; float: right; margin-right: 4px;margin-top: 8px;">Quantity</span> 
                            <span style="font-size: 2.5vw; float: right; width: 100%; text-align: right;"><?php echo $ket; ?></span> 
                            
                            </form>
                           
        </div>      
<?php
    }    
?>
                    
                
                <div class="mobile-content">
                <div class="page-num-con">
<?php
    if($category=='all'){
        echo $product->setPageNumber($pageNum, $rowsPerPage);
    }else{
        echo $product->setPageNumberPerCat($pageNum, $rowsPerPage);
    }

    
?>
                    </div>
            </div>
      
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Shop"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Shop"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>