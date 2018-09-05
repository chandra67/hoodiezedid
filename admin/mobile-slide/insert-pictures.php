<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->imageType = 'mobile-slide';
        $image->imagePrimary = "no";
        $image->imageDescription = $_POST['imageDescription'];
        $image->imageHeaderId = 0;
        $image->imageName = $_POST['imageName'];
        if($image->insertImages()){
            echo "<script>alert(\"Picture Added!\");document.location = '../mobile.php'</script>";
        }else{
            echo "<script>alert(\"Error! addPicture() failed.\");document.location = '../mobile.php'</script>";
        }
  