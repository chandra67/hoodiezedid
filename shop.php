<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='Home';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    
  $rowsPerPage = 12;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
    $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;
?>
        <div class="content">
          
            <div class="mid-content">
                <div class="title">
                    <p><a href="#" class="current">All</a> <a href="#">Casual</a> <a href="#">Unique</a> <a href="#">Anime</a> <a href="#">Superhero</a> <a href="#">Games</a> <a href="#">Promo</a></p>
                </div>
                <div class="mid-content-box">
<?php
    $product = new product();
    if($product->cekRows()==0){
        echo "<p>We don't have product yet!</p>";
    }
    $productView = $product->setVarProduct($offset, $rowsPerPage);
    $image = new image();
    $image->imageType = 'product';
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
?>
                    <div class="product-box" onclick="location.href='product/<?php echo $productView[$i]->idProduct; ?>/<?php echo $productView[$i]->productName; ?>';" style="background-image: url(uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>); background-position: center top; background-size:282px 282px; background-repeat: no-repeat;">
                        
                        <div class="name">
                            <div class="productname">
                                <p><b><?php echo $productView[$i]->productName; ?></b></p>
                            </div>
                        </div>
                        <div class="price">
                            <div class="productprice">
                                 <p>Rp <?php echo number_format($productView[$i]->productPrice, 0, ',', '.'); ?>,-</p>
                            </div>
                        </div>
                        
                    </div>
<?php
    }    
?>
                    
                </div>
                <div class="page-num-con">
<?php
    echo $product->setPageNumber($pageNum, $rowsPerPage);
?>
                    </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>