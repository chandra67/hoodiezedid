    <?php
        $meta = new setting();
        $meta->idSetting = 'siteTitle';
        $meta->selectSetting();
    ?>
    <form name="form" id="form" action='other/update-site_information.php' method="post">
        <p>Website Tittle <br><small>(examples: Welcome to My Site)</small></p>
        <input name="title" type="text" class="input-400px" value="<?php echo $meta->settingDescription; ?>" required>
              
                    <?php
                    $meta->idSetting = 'siteKeyword';
                    $meta->selectSetting();
                    ?>
                    <p>Meta Keyword<br><small>(examples: illustration, drawing, design, design idea). Separate each keyword with a comma(,).</small></p>
                    <textarea name="key" id='key' class="textarea-100"><?php echo $meta->settingDescription; ?></textarea>
          
                    <?php
                    $meta->idSetting = 'siteDescription';
                    $meta->selectSetting();
                    ?>
                   <p>Meta Description<br><small>(Description of your site)</small></p>
              <textarea name="desc" id='desc'class="textarea-100"><?php echo $meta->settingDescription; ?></textarea>
               <p align=left><input type="submit" value="Save" class="submit-button-auto"/></p>
    </form>