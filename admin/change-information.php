<?php
    include "../modul/mainFunction.php";
    connect();
    cekLogin();
    include "../modul/userModul.php";
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->updateUser();
 ?>
