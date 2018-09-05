           
                 <form name="addNewProduct" action='product/insert-category.php' method="post" enctype='multipart/form-data'>
                   
                        <h3>Add Category</h3>
                         <p><small><a href="product.php?tab=addnew">Add Product</a> > <a href="#">Manage Category</a></small></p><br>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Category Name</p></td><td width=800> <input class="input-text" type=text name='productCategory' size=75  required></td></tr>
                         
                            <tr><td></td><td><p align=left><input type="submit" value="Add Category" class="submit-button-auto"/></p></td></tr>
                            </table>
                         <br>
                         <h3>Category List</h3><br>
<?php
    $productType = new product();
    $productTypeView = $productType->setVarProductType();
    for($i = 0; $i < count($productTypeView); $i++){
?>
                    <p><?php echo $productTypeView[$i]->productTypeName; ?> - <a href="product/delete-category.php?productType=<?php echo $productTypeView[$i]->productType; ?>" onClick="if(confirm('Are you sure you want to delete this category?')) {return true;}else{return false;}">Delete</a></p>
                   
<?php
    }
?>
                </form><br />