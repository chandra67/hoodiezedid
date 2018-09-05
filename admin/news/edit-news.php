              <?php
             $news = new news();
             $news->idNews = $_GET['newsno'];
             $news->setVar();
             
             ?>
                        <h3>Edit News</h3>
                        <p><small><a href="news.php">News</a> > <a href="#">Edit News</a></small></p><br>
                 <form name="addNewProduct" action='news/update-news.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Title</p></td><td width=800> <input class="input-text" type=text name='newsTitle' value="<?php echo $news->newsTitle; ?>" size=75  required></td></tr>
                                <tr>
                                    <td>
                                        <p>Categories</p>
                                    </td>
                                    <td>
                                        <select name="newsCategory" class="input-select">
                                            <option value="<?php echo $news->newsCategory ?>"><?php echo $news->viewCategoryName(); ?> (selected)</option>
                                            <?php
                                            $news->viewDropDown();
                                            ?>
                                        </select> | <a href="news.php?tab=addnew&&category=yes"> Add New Category</a>
                                    </td>
                                </tr>   
                         <tr>
                             <td>News Picture<br><small>(format: jpg/jpeg/png, size: <2MB) </small></td>
                             <td><img src="crop.php?h=100&w=130&f=../uploaded_images/news/<?php echo $news->idNews."/".$news->newsImage; ?>" /><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                 <tr>
                                     <td colspan="2">
                                        <p>News Content</p>
                                        <input type="hidden" name="idNews" value="<?php echo $news->idNews; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="newsDescription" cols="150" rows="35"><?php echo $news->newsDescription; ?></textarea></td>
                                </tr>
                                <tr><td width=200><p align=left>Meta Keyword</p><small>(examples: illustration, drawing, design, design idea). Separate each keyword with a comma(,).</small></td><td width=800> <textarea class="input-text" type=text name='newsMetaKeyword' cols="70" rows="7"  required><?php echo $news->newsMetaKeyword; ?></textarea></td></tr>
                                <tr><td width=200><p align=left>Meta Description</p><small>(example: news abstract)</small></td><td width=800> <textarea class="input-text" type=text name='newsMetaDescription' cols="70" rows="7"  required><?php echo $news->newsMetaDescription; ?></textarea></td></tr>
                            <tr><td></td><td><p align=left><input type="submit" value="Update News" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />