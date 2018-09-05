<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->imageType = $_POST['imageType'];
        $image->imagePrimary = "no";
        $image->imageDescription = "no description";
        $image->imageName = $_POST['imageName'];
        $image->imageHeaderId = "0";
        if($image->insertImages()){
            echo "<script>alert(\"Picture Added!\");document.location = '../contest.php?tab=addnew';</script>";
        }else{
            echo "<script>alert(\"Error! addPicture() failed.\");document.location = '../contest.php?tab=addnew';</script>";
        }
  