<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='RESULT';
    include 'header.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/artistModule.php';
    include '../modul/stockModule.php';
    
  
?>
            <div class="mobile-content">
                    <p><b>PRODUCT SEARCH RESULT</b></p>
            </div>
<?php
    $product = new product();
    
    $search = $_POST['search'];

     $productView = $product->searchProduct($search);
    if(empty($productView)){
        echo "<div class=\"mobile-content\"><p>Your search returned zero results.</p><br><br></div>";
    }else{
    
        $image = new image();
        $image->imageType = 'product';
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
                                        $addto = "PRODUCT NOT AVAILABLE";
                                    }else{
                                        $addto = "ADD TO CART*";
                                        $cart = "/";
                                    }
                                }else{
                                    $addto = "PRODUCT NOT AVAILABLE";
                                    $cart = "disabled";
                                }

                               
                                

        ?>
        <div class="mobile-content-product-info">
              
                               
                                     <form action="shop/cart/?action=add&code=<?php echo $productView[$i]->idProduct; ?>" name="addcart"  enctype='multipart/form-data' method="post">
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
                                        <input type="radio" id="<?php echo $stockView[$i]->idStock; ?>" value="<?php echo $stockView[$z]->idStock; ?>" name="idStock" <?php echo $zero; ?>>
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
    }  
?>
                <div class="mobile-content">
                    <p><b>ARTIST SEARCH RESULT</b></p>
                </div>
                <div class="mobile-content">
<?php
     $artist = new artist();
    

     $artistView = $artist->searchArtist($search);
    if(empty($artistView)){
        echo "Your search returned zero results.";
    }else{
    
        for($i = 0; $i < count($artistView); $i++){
    ?>
                        <div class="artist-box" >
                            <a href='artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                                <img src="http://meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                                <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                            </a>
                        </div>
    <?php
        }  
    }  
?>
                </div>
            
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Search"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Search"><!--
//--></script>
        <?php
    include 'footer.php';
?>