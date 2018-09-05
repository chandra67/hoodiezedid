<?php
    
   
    
    $image = new image();
    $image->idImage = $_GET['idImage'];
    $image->setVar();
   

    $hover = new image();
    $hover->imageHeaderId = $image->idImage;
    $hover->imageType = "slideshow-hover";
    $hoverView = $hover->setVarImageAll();
    
    ?>

                        <h3>Add Hover Image</h3>
                        <p><small><a href="slideshow.php">Manage Slideshow</a> > <a href="##">Add Hover Image</a></small></p><br>
                        <p><img src="crop.php?h=180&w=400&f=../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->imageUrl; ?>" /></p>
                        <h3>Add Image</h3>
                 <form name="editProduct" action='slideshow/insert-hover.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr>
                             <td>Picture<br><small>(format: jpg/jpeg/png, size: <2MB, landscape orientation) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                         <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='imageName' size=25  required></td></tr>
                        
                         <tr>
                                        <input type="hidden" name="imageType" value="slideshow-hover" />
                                        <input type="hidden" name="imageHeaderId" value="<?php echo $image->idImage; ?>" />
                                       
                            <tr><td></td><td><p align=left><input type="submit" value="Add Picture" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />
                
                <h3>Hover Image List</h3>
                <div class="content-auto">
                    <?php
                        for($i = 0; $i < count($hoverView); $i++){    
                    ?>
                        <div class="slideshow-box" >
                            <img src="crop.php?h=180&w=400&f=../uploaded_images/<?php echo $hoverView[$i]->imageType."/".$hoverView[$i]->imageHeaderId."/".$hoverView[$i]->imageUrl; ?>" />
                            <div class="info">
                                <p><a href="slideshow/delete-pictures.php?imageno=<?php echo $hoverView[$i]->idImage; ?>" onClick="if(confirm('Are you sure you want to delete this pictures?')) {return true;}else{return false;}">Delete</a></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                