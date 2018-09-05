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
    
 
?>
        <div class="content">
           
            <div class="mid-content">
                <?php
                 if(isset($_GET['productno']))
    {
    $idProduct = $_GET['productno'];
        
        $product = new product();
        $product->idProduct = $idProduct;
        $product->setVar();
        $image = new image();
        $image->imageType = 'product';
        $image->imageHeaderId = $product->idProduct;
        
        $rowsPerPage = 20;
        $pageNum = 1;
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sort = "ASC";
        $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);

        $category =  $product->productType;

        include 'category-menu.php';
      
   
?>
                <div class="mid-content-box">
<?php
        $primaryImage = new image();
        $primaryImage->imageType = 'product';
        $primaryImage->imageHeaderId = $product->idProduct;
        $primaryImage->selectPrimary();
?>
                        <div class="product-image" >
                            <script>
                                var imageIdArray=new Array(
<?php
        $jumlahImage = count($imageView);
        for($i = 0; $i < count($imageView); $i++){               
                        if($i == $jumlahImage-1){
                            echo "\"".$imageView[$i]->idImage."\"";
                        }else{
                            echo "\"".$imageView[$i]->idImage."\",";
                        }
        }       
?> 
                                );
                            </script>
<?php
        for($i = 0; $i < count($imageView); $i++){               
?>
                            <img src="../../../uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" width="500" height="500" class="image-zoom" id="<?php echo $imageView[$i]->idImage; ?>"/>
<?php
        }       
?> 
                            <div class="slider"  id="ex3">
<?php
        //for($i = 0; $i < count($imageView); $i++){               

                                //<img src="../../crop.php?h=90&w=90&f=uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; " style="float: left;margin-bottom:5px; cursor: pointer;" onclick="showImage('<?php echo $imageView[$i]->idImage; ', '<?php echo $jumlahImage; ');"/>

              
?>
                                <script>showOneImage('<?php echo $primaryImage->idImage; ?>');</script>
                            </div>
                        </div>
                        <div class="product-info">
                            <p><span style="font-size: 55px; color:#000; padding-top: 3px;padding-top: 5px;padding-bottom: 5px;"padding-right: 5px;><?php echo $product->productName; ?></span></p>
                            <?php
                                 $artist= new artist();
                                $artist->idArtist =  $product->idArtist;
                            ?>
                            <p style="padding-left: 5px;"><b>BY: <a href="../../artist/<?php echo $artist->idArtist; ?>/<?php echo str_replace(" ", "-", $artist->viewArtistName()); ?>" class="by"><?php echo strtoupper($artist->viewArtistName()); ?></a></b></p>
                            <div style="font-size: 25px; color:#000; padding: 5px; margin-top:20px;">
                                <?php echo $product->productDescription; ?>
                            </div>
                            <br>
                            <p style="font-size: 30px; padding: 5px; color: #000 ;">IDR <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p>
                            <form action="../../shop/cart/?action=add&code=<?php echo $product->idProduct; ?>" name="addcart"  enctype='multipart/form-data' method="post">
                                <div class="size">
                                    <input type="hidden" name="idStock" id="idStock" value="0" />
                              <?php
                                    $stock = new stock();
                                    $stock->idProduct =  $idProduct;
                                    
                                    $stockView = $stock->setVarStock();
                                    $status= 0;
   
                                    for($i = 0; $i < count($stockView); $i++){
                                        if($stockView[$i]->stockQuantity == 0){
                                            $zero = "disabled";
                                        }else{
                                            $zero = "required";
                                            $status++;
                                        }
                              ?>
                                    
                                    <div class="<?php echo $stockView[$i]->stockName; ?>">
                                        <input type="radio" id="<?php echo $stockView[$i]->idStock; ?>" value="<?php echo $stockView[$i]->idStock; ?>" name="idStock" <?php echo $zero; ?>>
                                        <label for="<?php echo $stockView[$i]->idStock; ?>"></label>
                                    </div>
                            <?php
                                }
                            ?>
                            </div>
                            <?php
                                $addto = "ADD TO CART";
                                if($status == 0){
                                    $cart = "disabled";
                                    $addto = "PRODUCT NOT AVAILABLE";
                                }else{
                                    $cart = "/";
                                }
                            ?>
                            
                            
                            <p>Quantity <input name="productQuantity" type="text" class="quantity-input" value="1" required></p><br>
                            <input type="submit" value="<?php echo  $addto; ?>"  class="addtocart" <?php echo $cart; ?>>*
                            </form>
                            <small>*choose size first</small>
                        </div>
                        
                        <?php
    }else{
        echo "<p>404 not found!</p>";
    }
?>
                </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Product"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Product"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>