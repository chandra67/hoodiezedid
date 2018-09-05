<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/imageModule.php";
  
    
        $image = new image();
        $image->idImage = $_POST['idImage'];
        $image->imageName = $_POST['imageName'];
        $image->imageDescription = $_POST['imageDescription'];

        if($image->updateInfo()){
            echo "<script>alert(\"Information Updated!\");document.location = '../slideshow.php?edit=yes&&idImage=".$image->idImage."'</script>";
        }else{
            echo "<script>alert(\"Error!\");document.location = '../slideshow.php?edit=yes&&idImage=".$image->idImage."'</script>";
        }
  