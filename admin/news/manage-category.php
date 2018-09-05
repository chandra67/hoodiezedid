           
                 <form name="addNewProduct" action='news/insert-category.php' method="post" enctype='multipart/form-data'>
                   
                        <h3>Add Category</h3>
                         <p><small><a href="news.php?tab=addnew">Add News</a> > <a href="#">Manage Category</a></small></p><br>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Category Name</p></td><td width=800> <input class="input-text" type=text name='newsCategory' size=75  required></td></tr>
                         
                            <tr><td></td><td><p align=left><input type="submit" value="Add Category" class="submit-button-auto"/></p></td></tr>
                            </table>
                         <br>
                         <h3>Category List</h3><br>
                            <?php
                            $news = new news();
                                            $news->viewCategoryList();
                                            ?>
                </form><br />