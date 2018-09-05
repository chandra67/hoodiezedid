<?php
    header("Content-type: text/css");
    
    include 'modul/mainFunction.php';
    connect();
    include 'modul/siteSettingModule.php';
    
    $bgType = new setting();
    $bgType->idSetting = 'bodyBackgroundType';
    $bgType->selectSetting();
    
    $bgImage = new setting();
    $bgImage->idSetting = 'bodyBackgroundImage';
    $bgImage->selectSetting();
    
    $bgColor = new setting();
    $bgColor->idSetting = 'bodyBackgroundColor';
    $bgColor->selectSetting();
?>
body {
	height: 100%;
	width: 100%;
        <?php
        if($bgType->settingDescription == 'image'){
            ?>
         background-image: url(uploaded_images/setting/<?php echo $bgImage->idSetting."/".$bgImage->settingDescription; ?>);
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center top;
        <?php
        }else{
            ?>
        background-color: <?php echo $bgColor->settingDescription; ?>;
        
            <?php
        }
        ?>
        
}