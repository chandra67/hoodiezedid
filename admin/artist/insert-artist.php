<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/artistModule.php";
    
    $artist = new artist();
    $artist->artistName = $_POST['artistName'];
    $artist->artistAge = $_POST['artistAge'];
    $artist->artistCity = $_POST['artistCity'];
    $artist->artistGender = $_POST['artistGender'];
    $artist->artistFocus = $_POST['artistFocus'];
    $artist->artistAbout = $_POST['artistAbout'];
    $artist->artistVideo = $_POST['artistVideo'];
    $artist->insertArtist();
    
    