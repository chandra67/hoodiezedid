<?php
    
   
    
    $image = new image();
    $image->imageHeaderId = "0";
    $image->imageType = "slideshow";
    $rowsPerPage = 14;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
    $pageNum = $_GET['page'];
    }
    $sort = "DESC";
    $offset = ($pageNum - 1) * $rowsPerPage;
    $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);
    
    ?>
        <div class="hidden-form" id="add-picture">
             
                 <form name="editProduct" action='slideshow/insert-pictures.php' method="post" enctype='multipart/form-data'>
                   <p>Picture<br><small>(format: jpg/jpeg/png, size: <2MB, landscape orientation) </small></p>
                    <input name='picture' type='file'  class="input-400px" required></p>
                    <p align=left>Picture Name</p>
                    <input  class="input-400px" type=text name='imageName' size=25  required></td></tr>
                    <p align=left>Link<br><small>(example: http://www.pengrajinsitus.com/link) </small></p>
                    <input  class="input-400px" type=text name='imageDescription' size=25  required>

                                        <input type="hidden" name="imageType" value="<?php echo $image->imageType; ?>" />
                                        <input type="hidden" name="imageHeaderId" value="0" />
                                       
                           <p align=left><input type="submit" value="Add Picture" class="submit-button-auto"/></p>
                     
                </form>
        </div>
                     
                       
                <div class="content-auto">
                        <div class="slideshow-add">
                            <img src="images/add.png" onclick="showHiddenForm('add-picture','330px');" title="Add Picture"/>
                        </div>
                    <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                        <div class="slideshow-box" style="background-image: url(../uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>); background-position: center center; background-size: cover;" >
                            <div class="info">
                                <p><a href="slideshow.php?edit=yes&&idImage=<?php echo $imageView[$i]->idImage; ?>"><img src="images/edit.png" height="50"  title="Edit"/></a>  <a href="slideshow/delete-pictures.php?imageno=<?php echo $imageView[$i]->idImage; ?>" onClick="if(confirm('Are you sure you want to delete this pictures?')) {return true;}else{return false;}"><img src="images/delete.png" height="50" title="Delete"/></a></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                