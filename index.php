<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='Home';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/artistModule.php';


      // include "Mobile_Detect.php";
    //$detect = new Mobile_Detect();
    
    
        //if ($detect->isMobile()){
//echo "<script>document.location = 'http://mobile.meraki.co.id';</script>";
       // }//
  
?>
       
        <div class="content" style="padding-top: 30px;">
            <div class="mid-content">
                <div class="mid-content-box" style="overflow: hidden;">
                    <div class="home-left" style="margin-right: 8px;background-color: red;">
                        <?php
                            include "slideshow.php";

                        ?>
                    </div>
                    <div class="home-left" style="float: right;">
                         <div class="menu" style="width: 580px; padding-top: 5px;padding-bottom: 8px;margin-bottom: 10px;overflow: hidden; text-align: left;">
                                <a href="##" class="current" >Featured Product</a>
                               
                          </div>
                        <?php
    $product = new product();
    if($product->cekRows()==0){
        echo "<p>We don't have product yet!</p>";
    }
    $productView = $product->selectRandom(4);
    $image = new image();
    $image->imageType = 'product';
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
?>
                     <div class="product-box-noshadow-home" onclick="location.href='product/<?php echo $productView[$i]->productPermalink; ?>';" style="background-image: url(images/bg-home.png);">
                         <img src="uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" style="position: absolute; top: 0; left: 0; width: 278px;height: 278px;"/>
                        <div class="view">
                           
                        </div>
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
                </div>
            </div>
        </div>
    
      
        <?php
         $rowsPerPage = 12;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
        $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

        $category= 'all';
    


        ?>
         <div class="menu">
                <a href="##" class="current">Latest Product</a>
               
          </div>
        <div class="content" style="padding-top: 10px;">
          
            <div class="mid-content">
             
                <div class="mid-content-box">
<?php
    $product = new product();
    $product->productType = $category;
    
    if($category=='all'){
        $productView = $product->setVarProduct($offset, $rowsPerPage);
    }else{
        if($product->cekRowsPerCat()==0){
            echo "<p style='font-family: estre;' align='right'>We don't have product yet in ";
            echo $productType->printCatName($category)." category</p>";
        }

        $productView = $product->setVarProductPerCat($offset, $rowsPerPage);
    }
    
    $image = new image();
    $image->imageType = 'product';
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
?>
                     <div class="product-box-noshadow" onclick="location.href='product/<?php echo $productView[$i]->productPermalink; ?>';" >
                         <img src="uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" style="position: absolute; top: 0; left: 0; width: 280px;height: 280px;"/>
                        <div class="view">
                           
                        </div>
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
                  <div class="view-all">
                       <p>
                         <a href="shop/all-category" >View All Product</a> 

                        </p>
                    </div>
                 
                </div>
                
            </div>
        </div>
       
                
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>