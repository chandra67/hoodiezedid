<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='Shop';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    
   $rowsPerPage = 12;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
        $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

    $category = 'all';

    if(isset($_GET['category']))
    {
        $category= $_GET['category'];
    }
?>
 <?php
                include 'category-menu.php';
                ?>
        <div class="content" style="padding-top: 10px;">
          
            <div class="mid-content" id="load-more">
               
                <div class="mid-content-box">
<?php



    $product = new product();
   
    
    if($category=='all'){
         $product->productType = $category;
         $categoryPerma = $category;
        $productView = $product->setVarProduct($offset, $rowsPerPage);
    }else{
         $cat = new category();
        $cat->permalink = $category;
        $cat->setVar();

        $categoryPerma = $category;

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
?>
                      <div class="view-all" id="loadmore"  data-page="2">
                       <p>
                         <a href="##" >Show More</a> 
                        </p>
                    </div>
                </div>
                    
                    <script type="text/javascript">
$(document).on('click','.view-all',function () {
  $(this).text('Loading...');
    var ele = $('.view-all');
        $.ajax({
      url: 'category-load-more.php?category=<?php echo  $categoryPerma; ?>',
      type: 'POST',
      data: {
              page:$(this).data('page'),
            },
      success: function(response){
           if(response){
             ele.hide();
                $("#load-more").append(response);
              }
            }
   });
});
</script>
                
              
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Shop"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Shop"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>