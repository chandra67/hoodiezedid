    <?php
         $contact = new setting();
    ?>
    <form  action='other/update-contact.php' method="post" enctype="multipart/form-data">
        
		<table cellpadding=5 >
                <tr>
                    <?php
                         $contact->idSetting = 'contactEmail';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Email</p></td>
                    <td > <p align=left><input name='contactEmail' class="input-400px" type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                <tr>
                     <?php
                         $contact->idSetting = 'contactFacebook';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Facebook</p></td>
                    <td > <p align=left><input name='contactFacebook' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                <tr>
                     <?php
                         $contact->idSetting = 'contactTwitter';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Twitter</p></td>
                    <td > <p align=left><input name='contactTwitter' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                 <tr>
                     <?php
                         $contact->idSetting = 'contactInstagram';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Instagram</p></td>
                    <td > <p align=left><input name='contactInstagram' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                 <tr>
                     <?php
                         $contact->idSetting = 'contactT';
                         $contact->selectSetting();
                    ?>
                    <td ><p>t</p></td>
                    <td > <p align=left><input name='contactT' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                 <tr>
                     <?php
                         $contact->idSetting = 'contactPath';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Path</p></td>
                    <td > <p align=left><input name='contactPath' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                 <tr>
                     <?php
                         $contact->idSetting = 'contactYoutube';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Youtube</p></td>
                    <td > <p align=left><input name='contactYoutube' class="input-400px"  type='text' value='<?php echo $contact->settingDescription; ?>'/></p></td>
                </tr>
                 <tr>
                     <?php
                         $contact->idSetting = 'contactText';
                         $contact->selectSetting();
                    ?>
                    <td ><p>Catch Us Text</p></td>
                    <td > <p align=left><textarea name='contactAddress' cols="60" rows="5" class="ckeditor" type='text' /><?php echo $contact->settingDescription; ?></textarea></p></td>
                </tr>
                
		
		<tr><td><p align=left><input type="submit" value="Update Settings" class="submit-button-auto"/></p></td><td></td></tr>
		</table>
	</form>