<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/stockModule.php";
    
    $stock = new stock();
    $stock->stockQuantity = $_POST['stockQuantity'];
    $stock->stockName = $_POST['stockName'];
    $stock->idProduct = $_POST['idProduct'];
    
    
    if($stock->insertStock()){
         echo "<script>alert(\"Stock Added!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }else{
        echo "<script>alert(\"Add Stock Failed!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }