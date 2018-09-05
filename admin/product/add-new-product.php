           
                 <form name="addNewProduct" action='product/insert-product.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr>
                             <td>Primary Picture<br><small>(format: jpg/jpeg/png, size: <2MB, portrait orientation) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                                <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='productName' size=25  required></td></tr>
                              <tr>
                                    <td>
                                        <p>Categories</p>
                                    </td>
                                    <td>
                                        <select name="productType" class="input-select">
                                            <?php
                                            $produk = new product();
                                            $produk->viewDropDown();
                                            ?>
                                        </select> | <a href="product.php?category=yes&&tab=addnew">Add New Category</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Availability</p>
                                    </td>
                                    <td>
                                        <select name="productAvailability" class="input-select">
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
                                        <select name="featured" class="input-select">
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
                                        Rp <input class="input-text" type=text name='productPrice' size=25  required>,-
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>Discount</p>
                                    </td>
                                    <td>
                                         <input class="input-text" type=text name='productDiscount' size=25 value="0" required> %
                                    </td>
                                </tr><?php

                                 $artist= new artist();
    ?>
                                  
              
                                 <tr>
                                     <td colspan="2">
                                        <p>Description</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="productDescription" cols="120" rows="7"></textarea></td>
                                </tr>
                            <tr><td></td><td><p align=left><input type="submit" value="Add Product" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />