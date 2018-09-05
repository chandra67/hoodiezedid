<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 5;
     $about = new setting();
     
      $about->idSetting = 'contestName';
     $about->settingDescription = $_POST['contestName'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contestTitle';
     $about->settingDescription = $_POST['contestTitle'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contestDescription';
     $about->settingDescription = $_POST['contestDescription'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
     
      $about->idSetting = 'contestInstruction';
     $about->settingDescription = $_POST['contestInstruction'];
     
     if($about->updateSetting()){
         $result -= 1;
     }

        $about->idSetting = 'contestBotText';
     $about->settingDescription = $_POST['contestBotText'];
     
     if($about->updateSetting()){
         $result -= 1;
     }
    
     echo "<script>alert(\"Contest informtaioni updated with $result error(s)!\");document.location = '../contest.php';</script>";


