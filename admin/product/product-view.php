<?php
     
    
    
    $rowsPerPage = 15;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
	$pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

   
    ?>

<div class="content-auto">

           <div class="hidden-form" id="add-picture">
             
                
                  <form name="addNewProduct" action='product/insert-product.php' method="post" enctype='multipart/form-data'>
                        <p>Primary Picture<br><small>(format: jpg/jpeg/png, size: <2MB, portrait orientation) </small></p>
                        <p><input name='picture' type='file' class="input-400px" required></p>
                        <p align=left>Name</p>
                         <input class="input-400px" type=text name='productName' size=25  required>
                          <p align=left>Permalink</p>
                         <input class="input-400px" type=text name='productPermalink' size=25  required>
                        <p>Categories</p>
                        <select name="productType"  class="input-400px">
                                            <?php
                                            $produk = new product();
                                            $produk->viewDropDown();
                                            ?>
                            </select> | <a href="product.php?category=yes&&tab=addnew">Add New Category</a>
                                   
                                        <p>Availability</p>
                                 
                                        <select name="productAvailability"  class="input-400px">
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                            <option value="Pre Order">Pre Order</option>
                                        </select>
                                  
                                        <p>Featured</p>
                                
                                        <select name="featured"  class="input-400px">
                                            <option value="no">no</option>
                                            <option value="yes">yes</option>
                                        </select>
                                    
                                        <p>Price</p>
                                  
                                        Rp <input  class="input-400px" type=text name='productPrice' size=25  required>,-

                                         <p>Weight</p>
                                  
                                        <input  class="input-400px" type=text name='productWeight' size=25  required>Kg
                                 
                                        <p>Discount</p>
                                  
                                         <input  class="input-400px" type=text name='productDiscount' size=25 value="0" required> %


                                        <p>Color</p>
                                 
                                        <select name="idArtist" class="input-400px">
                                            <?php
                                                    $color = new color();
                                                

                                          
   
                                                    $colorView = $color->selectAll();
                                               
                                                    for($i = 0; $i < count($colorView); $i++){

                                            ?>
                                                <option value="<?php echo $colorView[$i]->idColor; ?>"><?php echo $colorView[$i]->colorName; ?></option>
                                            <?php
                                                    }
                                            ?>
                                        </select>
                                
                                
                                        <p>Description</p>
                                  <textarea class="textarea-100" name="productDescription" cols="120" rows="7"></textarea></td>
                               <p align=left><input type="submit" value="Add Product" class="submit-button-auto"/></p>
                </form><br />
        </div>
                     
                       
                <div class="content-auto">
                        <div class="slideshow-add" onclick="showHiddenForm('add-picture','330px');">
                            <img src="images/add.png"  title="Add Album" height="40px" /> <p>Add Product</p>
                        </div>
                </div>
<?php
    $product = new product();
   
    $productView = $product->setVarProduct($offset, $rowsPerPage);
    $image = new image();
    $image->imageType = 'product';
    for($i = 0; $i < count($productView); $i++){
        $image->imageHeaderId = $productView[$i]->idProduct;
?>
                    <div class="product-box" >
                        <img src="crop.php?h=200&w=200&f=../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" />
                        <div class="info">
                            <p><b><?php echo $productView[$i]->productName; ?></b></p>
                            <p><a href="product.php?tab=product&&edit=yes&&productno=<?php echo $productView[$i]->idProduct; ?>">Edit Product Information</a></p>
                            <p><a href="product.php?tab=product&&stock=yes&&productno=<?php echo $productView[$i]->idProduct; ?>">Manage Stock</a></p>
                            <p><a href="product.php?tab=product&&pictures=yes&&productno=<?php echo $productView[$i]->idProduct; ?>">Manage Pictures</a></p>
                            <p><a href="product/delete-product.php?productno=<?php echo $productView[$i]->idProduct; ?>" onClick="if(confirm('Are you sure you want to delete this product?')) {return true;}else{return false;}">Delete</a></p>
                        </div>
                    </div>
<?php
    }    
?>
</div>
<div class="page-num-con">
<?php
    echo $product->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
    <br>
</div>      