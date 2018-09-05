<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/siteSettingModule.php";
    $result = 1;
     $about = new setting();
    
      $about->idSetting = 'contestPageTopBanner';
     
     if($about->insertPictures()){
         $result -= 1;
     }
     
    
     echo "<script>alert(\"Top banner updated with $result error(s)!\");document.location = '../contest.php';</script>";


