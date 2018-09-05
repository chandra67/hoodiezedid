<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='Shop';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    include '../modul/artistModule.php';


    if(isset($_GET['permalink']))
    {
    $permalink = $_GET['permalink'];
        
        $product = new product();


        if ($product->cekRowViewId($permalink) > 0) {

             $idProduct = $product->viewId($permalink);
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

        $cat = new category();
        $cat->idCategory = $category;
        $cat->setVarFromId();

        $category = $cat->permalink;


       
      
   

    
     include 'category-menu.php';
?>
        <div class="content" style="padding-top: 10px;">
           
            <div class="mid-content">
             
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
                            <img src="../uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>"  class="image-zoom" id="<?php echo $imageView[$i]->idImage; ?>"/>
<?php
        }       
?> 
                            <div class="slider"  id="ex3">
<?php
        for($i = 0; $i < count($imageView); $i++){    
        ?>           

            <img src="crop.php?h=90&w=90&f=../uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" style="float: left;margin-bottom:5px; cursor: pointer;" onclick="showImage('<?php echo $imageView[$i]->idImage; ?>', '<?php echo $jumlahImage; ?>');"/>

          <?php    
      }
?>
                                <script>showOneImage('<?php echo $primaryImage->idImage; ?>');</script>
                            </div>
                        </div>
                        <div class="product-info">
                            <p><span style="font-size: 50px; color:#f5c501;background-color:#372f2d; padding-left: 10px;padding-top: 5px;padding-bottom: 5px;padding-right: 10px;"><?php echo $product->productName; ?></span></p>
                            <div style="font-size: 16px; color:#000; background-color:#f5c501; padding: 10px; margin-top:5px; font-family: estre;">
                                <?php echo $product->productDescription; ?>
                            </div>
                            <?php
                                  $color = new color();
                                                    $color->idColor = $product->idArtist;
                                                    $color->setVar();

                            ?>
                            <br><p><img src="../uploaded_images/color/<?php echo $color->idColor; ?>/<?php echo $color->colorImage; ?>" height="23" style=" float: left;"/> <span style="font-size: 20px; color:#372f2d;line-height: 28px; padding-left:8px;font-family: estre;"><?php echo $color->colorName; ?></span></p>
                           <form action="../cart/cart.php?action=add&code=<?php echo $product->idProduct; ?>" name="addcart"  enctype='multipart/form-data' method="post" onsubmit="return validateAddCart();">
                             
                                    <select name="idStock" class="choose-size">
                                        <option value="-">Choose Your Size</option>
                                    
                              <?php
                                       $stock = new stock();
                                        $stock->idProduct =  $product->idProduct;

                                        if( $product->productAvailability == 'In Stock'){
                                            if( $stock->cekStock() == 0){
                                                $cart = "disabled";
                                                $addto = "OUT OF STOCK";
                                            }else{
                                                $addto = "ADD TO CART";
                                                $cart = "/";
                                            }
                                        }elseif($product->productAvailability == 'Pre Order'){
                                             if( $stock->cekStock() == 0){
                                                $cart = "disabled";
                                                $addto = "OUT OF STOCK";
                                            }else{
                                                $addto = "PRE ORDER";
                                                $cart = "/";
                                            }
                                        }else{
                                            $cart = "disabled";
                                            $addto = "OUT OF STOCK";
                                        }


                                    $ket = "*Choose Size First";

                                     $stockView = $stock->setVarStock();
                                    $status= 0;

   
                                    for($z = 0; $z < count($stockView); $z++){
                                        if($stockView[$z]->stockQuantity > 0){
                                              ?>
                                         <option value="<?php echo $stockView[$z]->idStock; ?>"><?php echo $stockView[$z]->stockName; ?></option>
                                    
                                    <?php
                                        }
                           
                                }

                              
                            ?>
                            </select> <a href="##" onclick="showBox('mask');showBox('box');" class="removecart" style="font-family: estre; font-size: 14px; margin-left: 10px;">Size Guide</a>
                            <p style="font-size: 30px; padding: 5px; color: #372f2d;  margin-bottom:15px; font-family: fradm;">IDR <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p>
                            
                            
                           <input name="productQuantity" type="hidden"  value="1" required>
                            <input type="submit" value="<?php echo  $addto; ?>"  class="addtocart" <?php echo $cart; ?>>
                            </form>
                        </div>

    <?php
        }else{

            ?>
             <div class="content" style="padding-top: 10px;">
           
            <div class="mid-content">
             
                <div class="mid-content-box">

            <?php
             echo "<p align=center style=\"margin-top: 5vw;\">404 not found!</p>";
        }
       
                       
    }else{
          ?>
             <div class="content" style="padding-top: 10px;">
           
            <div class="mid-content">
             
                <div class="mid-content-box">

            <?php
        echo "<p align=center style=\"margin-top: 5vw;\">404 not found!</p>";
    }
?>
                </div>
            </div>
        </div>
        <div class="dialog-box2" id="box">
            <img src="../images/size.jpg" />
         </div>
        <div class="dialog-mask" id="mask" onclick="hide('box');hide('mask');">
             
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Product"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Product"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>