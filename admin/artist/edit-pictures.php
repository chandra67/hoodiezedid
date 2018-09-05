<?php
    
    $idArtist = $_GET['productno'];

    $artist = new artist();
    $artist->idArtist = $idArtist;
    $artist->setVar();
    
    $image = new image();
    $image->imageHeaderId = $artist->idArtist;
    $image->imageType = "artist";
    $image->imageDescription = "no description";
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

                        <h3>Manage <?php echo $artist->artistName; ?>'s Gallery</h3>
                        <p><small><a href="artist.php">Artist</a> > <a href="#">Manage Gallery</a></small></p><br>
                  
                        <h3>Add New Pictures</h3>
                 <form name="editProduct" action='artist/insert-pictures.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr>
                             <td>Picture<br><small>(format: jpg/jpeg/png, size: <2MB, portrait orientation) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                         <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='imageName' size=25  required></td></tr>
                         <tr>
                             <td><p>Artist</p></td>
                             <td><p><?php echo $artist->artistName; ?></p></td>
                         </tr>
                               
                                        <input type="hidden" name="imageType" value="<?php echo $image->imageType; ?>" />
                                        <input type="hidden" name="imageHeaderId" value="<?php echo $image->imageHeaderId; ?>" />
                                       
                            <tr><td></td><td><p align=left><input type="submit" value="Add Picture" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />
                
                <h3>Pictures List</h3>
                <div class="content-auto">
                    <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                        <div class="pictures-box" >
                            <img src="crop.php?h=200&w=200&f=../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" />
                            <div class="info">
                                <p><a href="artist/delete-pictures.php?imageno=<?php echo $imageView[$i]->idImage; ?>&&productno=<?php echo $image->imageHeaderId; ?>" onClick="if(confirm('Are you sure you want to delete this pictures?')) {return true;}else{return false;}">Delete</a></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                