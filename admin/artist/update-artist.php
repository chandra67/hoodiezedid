<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/artistModule.php";
    
    $artist = new artist();
    $artist->idArtist = $_POST['idArtist'];
    $artist->artistName = $_POST['artistName'];
    $artist->artistAge = $_POST['artistAge'];
    $artist->artistCity = $_POST['artistCity'];
    $artist->artistGender = $_POST['artistGender'];
    $artist->artistFocus = $_POST['artistFocus'];
    $artist->artistAbout = $_POST['artistAbout'];
     $artist->artistVideo = $_POST['artistVideo'];
    
    
    if($artist->updateArtist()){
         echo "<script>alert(\"Artist Information Updated!\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$artist->idArtist."';</script>";
    }else{
        echo "<script>alert(\"Update Failed!\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$artist->idArtist."';</script>";
    }

