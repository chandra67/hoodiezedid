<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/productModule.php";
    
    $product = new product();
    $product->productTypeName = $_POST['productCategory'];
    
    
    if($product->insertCat()){
         echo "<script>alert(\"Category Added!\");document.location = '../product.php?tab=addnew&&category=yes';</script>";
    }else{
        echo "<script>alert(\"Add Category Failed!\");document.location = '../product.php?tab=addnew&&category=yes';</script>";
    }