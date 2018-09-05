<?php
    include '../modul/mainFunction.php';
    connect();
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    
   $rowsPerPage = 12;
    $pageNum = 1;
    if(isset($_POST['page']))
    {
        $pageNum = $_POST['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

    $category = 'all';

    if(isset($_GET['category']))
    {
        $category= $_GET['category'];
    }




    $product = new product();

    ?>
 <div class="mid-content-box">

    <?php
   
    
    if($category=='all'){
         $product->productType = $category;
        $productView = $product->setVarProduct($offset, $rowsPerPage);
    }else{
         $cat = new category();
        $cat->permalink = $category;
        $cat->setVar();

        $category = $cat->idCategory;
         $product->productType = $category;

        if($product->cekRowsPerCat()==0){
            echo "<p style='font-family: estre;' align='left'>We don't have product yet in ";
            echo $productType->printCatName($category)." category</p>";
        }


        $productView = $product->setVarProductPerCat($offset, $rowsPerPage);
    }
    
    $image = new image();
    $image->imageType = 'product';
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
?>
                    <div class="product-box-noshadow" onclick="location.href='../product/<?php echo $productView[$i]->productPermalink; ?>';" >
                         <img src="../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" style="position: absolute; top: 0; left: 0;width: 280px;height: 280px;"/>
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

      if($i!=0){
    ?>

    



                      <div class="view-all"  data-page="<?php echo $pageNum+1; ?>">
                       <p>
                         <a href="##" >Show More</a> 
                        </p>
                    </div>
               
  <?php
  }
?>
</div>
	

