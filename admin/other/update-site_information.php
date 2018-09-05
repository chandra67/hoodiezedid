<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 3;
     $meta = new setting();
     $meta->idSetting = 'siteTitle';
     $meta->settingDescription = $_POST['title'];
     
     if($meta->updateSetting()){
         $result -= 1;
     }
      $meta->idSetting = 'siteKeyword';
     $meta->settingDescription = $_POST['key'];
     
     if($meta->updateSetting()){
         $result -= 1;
     }
     
      $meta->idSetting = 'siteDescription';
     $meta->settingDescription = $_POST['desc'];
     
     if($meta->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Meta updated with $result error(s)!\");document.location = '../other.php';</script>";
     

