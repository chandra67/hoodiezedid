<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/artistModule.php";
    include "../../modul/imageModule.php";
    
   
    
    
    $artist = new artist();
    $artist->idArtist = $_GET['productno'];

    $image = new image();
    $image->imageHeaderId =  $artist->idArtist;
    $image->imageType =  'artist';
    $imageView = $image->setVarImageAll();
    for($i = 0; $i < count($imageView); $i++){
        echo $imageView[$i]->deleteImages();
    }

  
    if($artist->deleteArtist()){
            echo "<script>alert(\"Artist Deleted!\");document.location = '../artist.php?tab=artist';</script>";
    }else{
            echo "<script>alert(\"Delete Failed!\");document.location = '../artist.php?tab=artist';</script>";
    }
