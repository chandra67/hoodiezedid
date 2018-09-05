<?php
    
    
    
    $idProduk = $_GET['productno'];

    $produk = new product();
    $produk->idProduct = $idProduk;
    $produk->setVar();
    ?>

                        <h3>Edit Product Information</h3>
                        <p><small><a href="product.php">Product</a> > <a href="#">Manage Product</a></small></p><br>
                  
                 <form name="editProduct" action='product/update-product.php' method="post" enctype='multipart/form-data'>
                     <table >
                         <tr><td width=100><p align=left>Name</p></td><td width=500> <input class="input-400px" type=text name='productName' size='25' value="<?php echo $produk->productName; ?>" required></td></tr>
                                
                                <tr>
                                    <td>
                                        <p>Categories</p>
                                    </td>
                                    <td>
                                        <select name="productType" class="input-400px">
                                            <option value="<?php echo $produk->productType; ?>"><?php echo $produk->viewType(); ?> (selected)</option>
                                            <?php
                                            $produk->viewDropDown();
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Availability</p>
                                    </td>
                                    <td>
                                        <select name="productAvailability" class="input-400px">
                                            <option value="<?php echo $produk->productAvailability; ?>"><?php echo $produk->productAvailability; ?> (selected)</option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                            <option value="Pre Order">Pre Order</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Featured</p>
                                    </td>
                                    <td>
                                        <select name="featured" class="input-400px">
                                            <option value="<?php echo $produk->featured; ?>"><?php echo $produk->featured; ?> (selected)</option>
                                            <option value="no">no</option>
                                            <option value="yes">yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Price</p>
                                    </td>
                                    <td>
                                        Rp <input class="input-400px" type=text name='productPrice' size=25 value="<?php echo $produk->productPrice; ?>"  required>,-
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>Weight</p>
                                    </td>
                                    <td>
                                        <input class="input-400px" type=text name='productWeight' size=25 value="<?php echo $produk->productWeight; ?>"  required>Kg
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Discount</p>
                                    </td>
                                    <td>
                                         <input class="input-400px" type=text name='productDiscount' size=25 value="0" required> %
                                    </td>
                                </tr>
                               </tr>
                                <tr>
                                    <td>
                                        <p>Color</p>
                                    </td>
                                    <td>
                                        <select name="idArtist" class="input-400px">
                                            <?php
                                                    $color = new color();
                                                    $color->idColor = $produk->idArtist;
                                                    $color->setVar();

                                            ?>
                                            <option value="<?php echo $color->idColor; ?>"><?php echo $color->colorName; ?> (selected)</option>
                                            <?php 
                                                
   
                                                    $colorView = $color->selectAll();
                                               
                                                    for($i = 0; $i < count($colorView); $i++){

                                            ?>
                                                <option value="<?php echo $colorView[$i]->idColor; ?>"><?php echo $colorView[$i]->colorName; ?></option>
                                            <?php
                                                    }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                  
                               
                                 <tr>
                                     <td colspan="2">
                                        <p>Description</p>
                                        <input type="hidden" name="idProduct" value="<?php echo $produk->idProduct; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="productDescription" cols="120" rows="7"><?php echo $produk->productDescription; ?></textarea></td>
                                </tr>
                            <tr><td><p align=left><input type="submit" value="Update Product" class="submit-button-auto"/></p></td><td></td></tr>
                            </table>
                </form><br />