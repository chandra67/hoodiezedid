 <?php
        $about = new setting();
        $about->idSetting = 'faqTitle';
        $about->selectSetting();
    ?>
</form>
                 <form action='other/update-faq.php' method="post" enctype='multipart/form-data'>
                        <h3>FAQ Setting</h3>
                        <table cellpadding="3">
                         <tr><td width=200><p align=left>FAQ Title</p></td><td width=800> <input class="input-text" type=text name='faqTitle' value="<?php echo $about->settingDescription; ?>" size=75  required></td></tr>
                               
                                        <?php
        $about->idSetting = 'faqText';
        $about->selectSetting();
    ?>
                                    
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="faqText" cols="150" rows="35"><?php echo $about->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Message" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br /><br>