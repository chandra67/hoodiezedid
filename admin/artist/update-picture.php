<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/artistModule.php";
    
    $artist = new artist();
    $artist->idArtist = $_POST['idArtist'];
    
    
    $artist->updatePicture();