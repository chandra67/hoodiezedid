<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->imageType = $_POST['imageType'];
        $image->imagePrimary = "no";
        $image->imageDescription = "no description";
        $image->imageHeaderId = $_POST['imageHeaderId'];
        $image->imageName = $_POST['imageName'];
        if($image->imagePrimary == 'Yes'){
            $image->removePrimary();
        }
        if($image->insertImages()){
            echo "<script>alert(\"Picture Added!\");document.location = '../artist.php?tab=artist&&pictures=yes&&productno=$image->imageHeaderId';</script>";
        }else{
            echo "<script>alert(\"Error! addPicture() failed.\");document.location = '../artist.php?tab=artist&&pictures=yes&&productno=$image->imageHeaderId';</script>";
        }
  