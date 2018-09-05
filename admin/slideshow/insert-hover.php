<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->imageType = 'slideshow-hover';
        $image->imagePrimary = "no";
        $image->imageDescription = "hover-image";
        $image->imageHeaderId = $_POST['imageHeaderId'];
        $image->imageName = $_POST['imageName'];

        mkdir("../../uploaded_images/slideshow-hover/".$image->imageHeaderId."/", 0777);
        if($image->insertImages()){
            echo "<script>alert(\"Hover Image Added!\");document.location = '../slideshow.php?hover=yes&&idImage=".$image->imageHeaderId."'</script>";
        }else{
            echo "<script>alert(\"Error! addPicture() failed.\");document.location = '../slideshow.php?hover=yes&&idImage=".$image->imageHeaderId."'</script>";
        }
  