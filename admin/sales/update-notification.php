<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 2;
     $about = new setting();
    
      $about->idSetting = 'paymentDetail';
       $about->settingDescription = $_POST['paymentDetail'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
    
      $about->idSetting = 'confirmationDetail';
     $about->settingDescription = $_POST['confirmationDetail'];
     
     if($about->updateSetting()){
         $result -= 1;
     }

    
     echo "<script>alert(\"Notification updated with $result error(s)!\");document.location = '../sales.php?tab=notification';</script>";


