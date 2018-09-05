<?php
    
   
    
    $image = new image();
    $image->idImage = $_GET['idImage'];
    $image->setVar();
   
    
    ?>

                        <h3>Edit Picture Information</h3>
                        <p><small><a href="mobile.php">Manage Picture</a> > <a href="##">Edit Picture Information</a></small></p><br>
                        <p><img src="crop.php?h=180&w=400&f=../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->imageUrl; ?>" /></p>
                 <form name="editProduct" action='mobile-slide/update-information.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='imageName' value="<?php echo $image->imageName; ?>" size=25  required></td></tr>
                         <tr><td width=200><p align=left>Link</p></td><td width=500> <input class="input-text" type=text name='imageDescription' value="<?php echo $image->imageDescription; ?>" size=25  required></td></tr>
                         <tr>
                            <input type="hidden" name="idImage" value="<?php echo $image->idImage; ?>" />
                                     
                                       
                            <tr><td></td><td><p align=left><input type="submit" value="Update Information" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />
                
          