<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->idImage = $_GET['imageno'];
        $image->imageHeaderId = $_GET['productno'];
        if($image->deleteImages()){
            echo "<script>alert(\"Picture Deleted!\");document.location = '../product.php?tab=product&&pictures=yes&&productno=$image->imageHeaderId';</script>";
        }else{
            echo "<script>alert(\"Error! deletePicture() failed.\");document.location = '../product.php?tab=product&&pictures=yes&&productno=$image->imageHeaderId';</script>";
            }
