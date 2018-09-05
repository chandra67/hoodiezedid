<?php
    
    
    
    $idArtist = $_GET['productno'];

    $artist = new artist();
    $artist->idArtist = $idArtist;
    $artist->setVar();
    ?>

            <h3>Edit Artist Information</h3>
        <p><small><a href="artist.php">Artist</a> > <a href="#">Manage Artist</a></small></p><br>
        <form name="artist" action='artist/update-picture.php' method="post" enctype='multipart/form-data'>
             <table cellpadding="3">
                         <tr>
                             <td>Artist Picture<br><small>(format: jpg/jpeg/png, size: <2MB, square orientation) </small></td>
                             <td><p>
                                    <img src="../uploaded_images/artist/<?php echo $artist->idArtist."/".$artist->artistPicture; ?>" height="150"/>
                             </p><p>
                             <input name='picture' type='file' class="input-text" required></p></td>
                             <input type="hidden" value="<?php echo $artist->idArtist; ?>" name="idArtist" />
                         </tr>
                        <tr><td></td><td><p align=left><input type="submit" value="Change Picture" class="submit-button-auto"/></p></td></tr>
                </table><Br>
        </form>
        <form name="artist" action='artist/update-artist.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                                <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" value="<?php echo $artist->artistName; ?>" type=text name='artistName' size=25  required></td>
                            </tr>
                             <tr>
                                    <td>
                                        <p>Age</p>
                                    </td>
                                    <td>
                                        <input class="input-text" value="<?php echo $artist->artistAge; ?>" type=text name='artistAge' size=25  required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Gender</p>
                                    </td>
                                    <td>
                                        <select name="artistGender" class="input-select">
                                            <option value="<?php echo $artist->artistGender; ?>"><?php echo $artist->artistGender; ?> (selected)</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>City</p>
                                    </td>
                                    <td>
                                         <input class="input-text" value="<?php echo $artist->artistCity; ?>" type=text name='artistCity' size=25  required> 
                                         <input type="hidden" value="<?php echo $artist->idArtist; ?>" name="idArtist" />
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>Focus</p>
                                    </td>
                                    <td>
                                         <input class="input-text" value="<?php echo $artist->artistFocus; ?>" type=text name='artistFocus' size=25  required> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Embed Video</p>
                                    </td>
                                    <td>
                                         <textarea name="artistVideo" cols="50" rows="6"><?php echo $artist->artistVideo; ?></textarea>
                                    </td>
                                </tr>
                                 <tr>
                                     <td colspan="2">
                                        <p>About</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="artistAbout" cols="120" rows="7"><?php echo $artist->artistAbout; ?></textarea></td>
                                </tr>
                            <tr><td></td><td><p align=left><input type="submit" value="Update Artist" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />

