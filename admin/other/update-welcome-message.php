<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 2;
     $about = new setting();
     $about->idSetting = 'welcomeTitle';
     $about->settingDescription = $_POST['welcomeTitle'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
      //$about->idSetting = 'aboutImage';
     
     //if($about->insertPictures()){
         //$result -= 1;
     //}
     
      $about->idSetting = 'welcomeMessage';
     $about->settingDescription = $_POST['welcomeMessage'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Welcome message updated with $result error(s)!\");document.location = '../other.php?tab=about';</script>";


