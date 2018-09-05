  <?php
  		$testi = new setting();
        $testi->idSetting = 'testimonialImage';
        $testi->selectSetting();
    ?>
                 <form action='other/update-testimonial.php' method="post" enctype='multipart/form-data'>
                        <h3>Testimonial Setting 1</h3>
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended rosulution: 150px X 150px </small></td>
                             <td width="400"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="150" width="150"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                  
    <?php
        $testi->idSetting = 'testimonialName';
        $testi->selectSetting();
    ?>
                        
                                <tr><td width=200><p align=left>Title</p></td><td width=400> <input class="input-text" type=text name='testimonialName' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
         $testi->idSetting = 'testimonialText';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="testimonialText" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Testimonial" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />

                 <?php
        $testi = new setting();
        $testi->idSetting = 'testimonialImage2';
        $testi->selectSetting();
    ?>
                 <form action='other/update-testimonial2.php' method="post" enctype='multipart/form-data'>
                        <h3>Testimonial Setting 2</h3>
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended rosulution: 150px X 150px </small></td>
                             <td width="400"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="150" width="150"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                  
    <?php
        $testi->idSetting = 'testimonialName2';
        $testi->selectSetting();
    ?>
                        
                                <tr><td width=200><p align=left>Title</p></td><td width=400> <input class="input-text" type=text name='testimonialName' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
         $testi->idSetting = 'testimonialText2';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="testimonialText" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Testimonial" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />



                 <?php
        $testi = new setting();
        $testi->idSetting = 'testimonialImage3';
        $testi->selectSetting();
    ?>
                 <form action='other/update-testimonial3.php' method="post" enctype='multipart/form-data'>
                        <h3>Testimonial Setting 3</h3>
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended rosulution: 150px X 150px </small></td>
                             <td width="400"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="150" width="150"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                  
    <?php
        $testi->idSetting = 'testimonialName3';
        $testi->selectSetting();
    ?>
                        
                                <tr><td width=200><p align=left>Title</p></td><td width=400> <input class="input-text" type=text name='testimonialName' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
         $testi->idSetting = 'testimonialText3';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="testimonialText" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Testimonial" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />



                 <?php
        $testi = new setting();
        $testi->idSetting = 'testimonialImage4';
        $testi->selectSetting();
    ?>
                 <form action='other/update-testimonial4.php' method="post" enctype='multipart/form-data'>
                        <h3>Testimonial Setting 4</h3>
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended rosulution: 150px X 150px </small></td>
                             <td width="400"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="150" width="150"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                  
    <?php
        $testi->idSetting = 'testimonialName4';
        $testi->selectSetting();
    ?>
                        
                                <tr><td width=200><p align=left>Title</p></td><td width=400> <input class="input-text" type=text name='testimonialName' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
         $testi->idSetting = 'testimonialText4';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="testimonialText" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Testimonial" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />


