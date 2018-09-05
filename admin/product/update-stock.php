<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/stockModule.php";
    
    $stock = new stock();
    $stock->stockQuantity = $_POST['stockQuantity'];
    $stock->stockName = $_POST['stockName'];
    $stock->idStock = $_POST['idStock'];
    $stock->idProduct = $_POST['idProduct'];
    
    
    if($stock->updateStock()){
         echo "<script>alert(\"Stock Updated!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }else{
        echo "<script>alert(\"Update Stock Failed!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }