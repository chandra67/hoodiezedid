           
                 <form name="addNewProduct" action='news/insert-news.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Title</p></td><td width=800> <input class="input-text" type=text name='newsTitle' size=75  required></td></tr>
                           <tr>
                                    <td>
                                        <p>Categories</p>
                                    </td>
                                    <td>
                                        <select name="newsCategory" class="input-select">
                                            <?php
                                            $news = new news();
                                            $news->viewDropDown();
                                            ?>
                                        </select>
                                    </td>
                                </tr>   
                         <tr>
                             <td>Picture<br><small>(format: jpg/jpeg/png, size: <2MB) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                                 <tr>
                                     <td colspan="2">
                                        <p>Content</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="newsDescription" cols="150" rows="35"></textarea></td>
                                </tr>
                                <tr><td width=200><p align=left>Meta Keyword</p><small>(examples: illustration, drawing, design, design idea). Separate each keyword with a comma(,).</small></td><td width=800> <textarea class="input-text" type=text name='newsMetaKeyword' cols="70" rows="7"  required></textarea></td></tr>
                                <tr><td width=200><p align=left>Meta Description</p><small>(example: news abstract)</small></td><td width=800> <textarea class="input-text" type=text name='newsMetaDescription' cols="70" rows="7"  required></textarea></td></tr>
                          
                            <tr><td></td><td><p align=left><input type="submit" value="Publish News" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />