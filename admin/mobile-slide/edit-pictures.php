<?php
    
   
    
    $image = new image();
    $image->imageHeaderId = "0";
    $image->imageType = "mobile-slide";
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

                        <h3>Add New Pictures</h3>
                 <form name="editProduct" action='mobile-slide/insert-pictures.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr>
                             <td>Picture<br><small>(format: jpg/jpeg/png, size: <2MB, landscape orientation) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                         <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='imageName' size=25  required></td></tr>
                         <tr><td width=200><p align=left>Link</p></td><td width=500> <input class="input-text" type=text name='imageDescription' size=25  required></td></tr>
                        
                         <tr>
                                        <input type="hidden" name="imageType" value="<?php echo $image->imageType; ?>" />
                                        <input type="hidden" name="imageHeaderId" value="0" />
                                       
                            <tr><td></td><td><p align=left><input type="submit" value="Add Picture" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />
                
                <h3>Picture List</h3>
                <div class="content-auto">
                    <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                        <div class="slideshow-box" >
                            <img src="crop.php?h=180&w=400&f=../uploaded_images/<?php echo $imageView[$i]->imageType."/".$imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" />
                            <div class="info">
                                <p><a href="mobile.php?edit=yes&&idImage=<?php echo $imageView[$i]->idImage; ?>">Manage Picture Information</a>  <br><a href="mobile-slide/delete-pictures.php?imageno=<?php echo $imageView[$i]->idImage; ?>" onClick="if(confirm('Are you sure you want to delete this pictures?')) {return true;}else{return false;}">Delete</a></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                