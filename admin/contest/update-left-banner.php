<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 1;
     $about = new setting();
    
      $about->idSetting = 'contestPageLeftBanne';
     
     if($about->insertPictures()){
         $result -= 1;
     }
     
    
     echo "<script>alert(\"How To Banner updated with $result error(s)!\");document.location = '../contest.php';</script>";


