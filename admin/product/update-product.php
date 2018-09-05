<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/productModule.php";
    
    $produk = new product();
    $produk->idProduct = $_POST['idProduct'];
     $produk->idArtist = $_POST['idArtist'];
    $produk->productName = $_POST['productName'];
    $produk->productDescription = $_POST['productDescription'];
    $produk->productType = $_POST['productType'];
    $produk->productAuthor = $_SESSION['idUser'];
    $produk->productPrice = $_POST['productPrice'];
     $produk->featured = $_POST['featured'];
    $produk->productDiscount = $_POST['productDiscount'];
    $produk->productAvailability = $_POST['productAvailability'];
    $produk->productWeight = $_POST['productWeight'];
    
    
    if($produk->updateProduct()){
         echo "<script>alert(\"Product Information Updated!\");document.location = '../product.php?tab=product&&edit=yes&&productno=".$produk->idProduct."';</script>";
    }else{
        echo "<script>alert(\"Update Failed!\");document.location = '../product.php?tab=product&&edit=yes&&productno=".$produk->idProduct."';</script>";
    }

