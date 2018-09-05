  <?php
  		$testi = new setting();
        $testi->idSetting = 'featuredArtistImage';
        $testi->selectSetting();
    ?>
                 <form action='artist/update-featured.php' method="post" enctype='multipart/form-data'>
                    
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br>orientation: landscape </small></td>
                             <td width="600"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>"  width="500"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                    
    <?php
        $testi->idSetting = 'featuredArtistLink';
        $testi->selectSetting();

        $artist= new artist();
        $artist->idArtist = $testi->settingDescription;
    ?>
                                  
                                <tr><td width=200><p align=left>Link to Artist</p></td><td width=800> 
                                    <select name="featuredArtistLink" class="input-text">
                                        <option value="<?php echo $testi->settingDescription; ?>"><?php echo $artist->viewArtistName(); ?> (selected)</option>
    <?php
    $artistView = $artist->selectAllArtist();
    for($i = 0; $i < count($artistView); $i++){
    ?>
                                        <option value="<?php echo $artistView[$i]->idArtist; ?>"><?php echo $artistView[$i]->artistName; ?></option>
    <?php
        }
    ?>
                                    </select>
                                </td></tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Setting" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />