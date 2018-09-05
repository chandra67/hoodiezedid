<?php
    include "../modul/mainFunction.php";
    connect();
    cekLogin();
    include "../modul/userModul.php";
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    if($user->cekOldPass()){
        $user->updatePass();
    }else{
        echo "<script>alert(\"Wrong Old Password!\");document.location = 'account-settings.php';</script>";
    }
 ?>
