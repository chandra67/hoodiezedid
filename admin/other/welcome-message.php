 <?php
        $about = new setting();
        $about->idSetting = 'welcomeTitle';
        $about->selectSetting();
    ?>
</form>
                 <form action='other/update-welcome-message.php' method="post" enctype='multipart/form-data'>
                        <h3>Welcome Message Setting</h3>
                        <table cellpadding="3">
                         <tr><td width=200><p align=left>Title</p></td><td width=800> <input class="input-text" type=text name='welcomeTitle' value="<?php echo $about->settingDescription; ?>" size=75  required></td></tr>
                                 <tr>
                                     <td colspan="2">
                                        <p>Text</p>
                                        <?php
        $about->idSetting = 'welcomeMessage';
        $about->selectSetting();
    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="welcomeMessage" cols="150" rows="35"><?php echo $about->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Message" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br /><br>

                 <?php
        $about->idSetting = 'homeMessageImage';
        $about->selectSetting();
    ?>
</form>
                 <form action='other/update-home-message.php' method="post" enctype='multipart/form-data'>
                        <h3>Home Message Setting</h3>
                        <table cellpadding="3">
                           <tr>
                             <td>Picture<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended rosulution: 300px X 360px </small></td>
                             <td width="600"><img src="../uploaded_images/setting/<?php echo $about->idSetting; ?>/<?php echo $about->settingDescription; ?>" height="300" width="360"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                     <td colspan="2">
                                        <p>Text</p>
                                        <?php
        $about->idSetting = 'homeMessageText';
        $about->selectSetting();
    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="homeMessageText" cols="150" rows="35"><?php echo $about->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Message" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />