<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 2;
     $about = new setting();
    
      $about->idSetting = 'homeMessageImage';
     
     if($about->insertPictures()){
         $result -= 1;
     }
     
      $about->idSetting = 'homeMessageText';
     $about->settingDescription = $_POST['homeMessageText'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Home message updated with $result error(s)!\");document.location = '../other.php?tab=about';</script>";


