<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/stockModule.php";
    
   
    
  $stock = new stock();
  $stock->idStock = $_GET['idStock'];
  $stock->idProduct = $_GET['idProduct'];
  
  if($stock->deleteStock()){
         echo "<script>alert(\"Stock Deleted!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }else{
        echo "<script>alert(\"Stock Failed!\");document.location = '../product.php?tab=product&&stock=yes&&productno=".$stock->idProduct."';</script>";
    }
