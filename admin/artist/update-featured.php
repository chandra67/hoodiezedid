<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 2;
     $about = new setting();
    
      $about->idSetting = 'featuredArtistImage';
     
     if($about->insertPictures()){
         $result -= 1;
     }
      $about->idSetting = 'featuredArtistLink';
     $about->settingDescription = $_POST['featuredArtistLink'];
     
     if($about->updateSetting()){
         $result -= 1;
     }

    
     echo "<script>alert(\"Feautred artist updated with $result error(s)!\");document.location = '../other.php?tab=testi';</script>";


