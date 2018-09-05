<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 2;
     $about = new setting();
     $about->idSetting = 'faqTitle';
     $about->settingDescription = $_POST['faqTitle'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
      //$about->idSetting = 'aboutImage';
     
     //if($about->insertPictures()){
         //$result -= 1;
     //}
     
      $about->idSetting = 'faqText';
     $about->settingDescription = $_POST['faqText'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"FAQ updated with $result error(s)!\");document.location = '../other.php?tab=about';</script>";


