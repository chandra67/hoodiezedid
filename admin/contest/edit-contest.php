  <?php
  		$testi = new setting();
        $testi->idSetting = 'contestName';
        $testi->selectSetting();
    ?>
                 <form action='contest/update-contest-information.php' method="post" enctype='multipart/form-data'>
                        <h3>Contest Information</h3>
                        <table cellpadding="3">
                        	<tr><td width=200><p align=left>Contest Name</p></td><td width=800> <input class="input-text" type=text name='contestName' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
        $testi->idSetting = 'contestTitle';
        $testi->selectSetting();
    ?>							<tr><td width=200><p align=left>Contest Description Title</p></td><td width=800> <input class="input-text" type=text name='contestTitle' value="<?php echo $testi->settingDescription; ?>" size=55  required></td></tr>
    <?php
        $testi->idSetting = 'contestDescription';
        $testi->selectSetting();
    ?>					 <tr>
                                    <td colspan="2"><p align=left>Contest Description</p></td>
                                </tr>
                       <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="contestDescription" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
    <?php
        $testi->idSetting = 'contestInstruction';
        $testi->selectSetting();
    ?>					 <tr>
                                    <td colspan="2"><p align=left>Contest Instruction</p></td>
                                </tr>
                       <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="contestInstruction" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <?php
        $testi->idSetting = 'contestBotText';
        $testi->selectSetting();
    ?>                   <tr>
                                    <td colspan="2"><p align=left>Contest Bottom Text</p></td>
                                </tr>
                       <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="contestBotText" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Contest Inormation" class="submit-button-auto"/></p></td></tr>
                            </table>
						</form>
<br><br>
<h3>Contest Banner</h3>
                        <form action='contest/update-home-banner.php' method="post" enctype='multipart/form-data'>
                        	 <?php
        $testi->idSetting = 'contestHomeBanner';
        $testi->selectSetting();
    ?>	
                        <table cellpadding="3">
                           <tr>
                             <td>Home Banner<br><small>format: jpg/jpeg/png<br> size: <2MB<br> orientation: landscape </small></td>
                             <td width="600"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="300" width="500"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                         <tr><td></td><td><p align=left><input type="submit" value="Update Home Banner" class="submit-button-auto"/></p></td></tr>
                            </table>
                        </form><br>
                                  
     <form action='contest/update-top-banner.php' method="post" enctype='multipart/form-data'>
                        	 <?php
        $testi->idSetting = 'contestPageTopBanner';
        $testi->selectSetting();
    ?>	
                        <table cellpadding="3">
                           <tr>
                             <td>Top Banner<br><small>format: jpg/jpeg/png<br> size: <2MB<br> orientation: landscape </small></td>
                             <td width="600"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" width="500"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                         <tr><td></td><td><p align=left><input type="submit" value="Update Top Banner" class="submit-button-auto"/></p></td></tr>
                            </table>
                        </form><br>
                         <form action='contest/update-left-banner.php' method="post" enctype='multipart/form-data'>
                        	 <?php
        $testi->idSetting = 'contestPageLeftBanne';
        $testi->selectSetting();
    ?>	
                        <table cellpadding="3">
                           <tr>
                             <td>How To Banner<br><small>format: jpg/jpeg/png<br> size: <2MB<br> orientation: landscape </small></td>
                             <td width="600"><img src="../uploaded_images/setting/<?php echo $testi->idSetting; ?>/<?php echo $testi->settingDescription; ?>" height="300"/><br><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                         <tr><td></td><td><p align=left><input type="submit" value="Update How To Banner" class="submit-button-auto"/></p></td></tr>
                            </table>
                        </form><br>
                       