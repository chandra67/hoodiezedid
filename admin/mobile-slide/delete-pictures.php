<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->idImage = $_GET['imageno'];
        if($image->deleteImages()){
            echo "<script>alert(\"Picture Deleted!\");document.location = '../mobile.php';</script>";
        }else{
            echo "<script>alert(\"Error! deletePicture() failed.\");document.location = '../mobile.php';</script>";
            }
