           
                
                   <?php
                  

                    $idProduct = $_GET['productno'];

                    $produk = new product();
                    $produk->idProduct = $idProduct;
                    $produk->setVar();
                   ?>
                    <form name="addNewProduct" action='product/insert-stock.php' method="post" enctype='multipart/form-data'>
                        <h3>Manage <?php echo $produk->productName; ?>'s Stock</h3>
                         <p><small><a href="product.php?tab=product">Product</a> > <a href="#">Manage Stock</a></small></p><br>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Stock Name</p></td><td width=800> <input class="input-text" type=text name='stockName' size=75  required></td></tr>
                         <tr><td width=200><p align=left>Stock Quantity</p></td><td width=800> <input class="input-text" type=text name='stockQuantity' size=75  required></td></tr>
                         <input type="hidden" value="<?php echo $idProduct; ?>" name="idProduct" /> 
                            <tr><td></td><td><p align=left><input type="submit" value="Add Stock" class="submit-button-auto"/></p></td></tr>
                            </table>
                        </form>
                         <br>
                         <h3>Stock List</h3><br>
                        
                         <?php

                                    $stock = new stock();
                                    $stock->idProduct =  $idProduct;

                                    $stockView = $stock->setVarStock();
   
                                    for($i = 0; $i < count($stockView); $i++){
                              ?>
                               <table cellpadding="3">
                                    <tr><td><form name="updateStock" action='product/update-stock.php' method="post" enctype='multipart/form-data'>
                                        <input class="input-text" type=text name='stockName' size=15 value="<?php echo $stockView[$i]->stockName; ?>"  required>

                                        </td><td>
                                        <input class="input-text" type=text name='stockQuantity' size=15 value="<?php echo $stockView[$i]->stockQuantity; ?>"  required>
                                        <input type=hidden name='idStock'  value="<?php echo $stockView[$i]->idStock; ?>"  required>
                                        <input type=hidden name='idProduct'  value="<?php echo $stockView[$i]->idProduct; ?>"  required>
                                    </td><td><input type="submit" value="Update Stock" class="submit-button-auto"/></td></form></tr>
                                    <tr><td colspan="2"><small>Last Update: <?php echo $stockView[$i]->lastUpdate; ?></small></td><td><p align="center" ><a href="product/delete-stock.php?idStock=<?php echo $stockView[$i]->idStock; ?>&&idProduct=<?php echo $stockView[$i]->idProduct; ?>" onClick="if(confirm('Are you sure you want to delete this category?')) {return true;}else{return false;}">Delete</a></p></td></tr>
                                </table>
                                <br>
                            <?php
                                }
                            ?>
                        
                <br />