<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 8;
     $about = new setting();
     
      $about->idSetting = 'contactEmail';
     $about->settingDescription = $_POST['contactEmail'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contactFacebook';
     $about->settingDescription = $_POST['contactFacebook'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contactTwitter';
     $about->settingDescription = $_POST['contactTwitter'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contactInstagram';
     $about->settingDescription = $_POST['contactInstagram'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     $about->idSetting = 'contactT';
     $about->settingDescription = $_POST['contactT'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     $about->idSetting = 'contactPath';
     $about->settingDescription = $_POST['contactPath'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     $about->idSetting = 'contactYoutube';
     $about->settingDescription = $_POST['contactYoutube'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     $about->idSetting = 'contactText';
     $about->settingDescription = $_POST['contactAddress'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Contact page updated with $result error(s)!\");document.location = '../other.php?tab=contact';</script>";


