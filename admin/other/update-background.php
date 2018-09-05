<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 3;
     $bg = new setting();
     $bg->idSetting = 'bodyBackgroundType';
     $bg->settingDescription = $_POST['bodyBackgroundType'];
     
     if($bg->updateSetting()){
         $result -= 1;
     }
      $bg->idSetting = 'bodyBackgroundImage';
     
     if($bg->insertPictures()){
         $result -= 1;
     }
     
      $bg->idSetting = 'bodyBackgroundColor';
     $bg->settingDescription = $_POST['bodyBackgroundColor'];
     
     if($bg->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Background updated with $result error(s)!\");document.location = '../other.php?tab=background';</script>";


