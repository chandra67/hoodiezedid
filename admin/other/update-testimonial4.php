<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 3;
     $about = new setting();
    
      $about->idSetting = 'testimonialImage4';
     
     if($about->insertPictures()){
         $result -= 1;
     }
      $about->idSetting = 'testimonialText4';
     $about->settingDescription = $_POST['testimonialText'];
     
     if($about->updateSetting()){
         $result -= 1;
     }

      $about->idSetting = 'testimonialName4';
     $about->settingDescription = $_POST['testimonialName'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Testimonial updated with $result error(s)!\");document.location = '../other.php?tab=testi';</script>";


