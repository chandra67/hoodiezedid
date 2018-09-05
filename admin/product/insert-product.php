<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/productModule.php";
    include "../../modul/imageModule.php";
    
    $produk = new product();
    $produk->productName = $_POST['productName'];
    $produk->idArtist = $_POST['idArtist'];
    $produk->productPermalink = $_POST['productPermalink'];
    $produk->productDescription = $_POST['productDescription'];
    $produk->productType = $_POST['productType'];
    $produk->productAuthor = $_SESSION['idUser'];
    $produk->productPrice = $_POST['productPrice'];
    $produk->featured = $_POST['featured'];
    $produk->productDiscount = $_POST['productDiscount'];
    $produk->productAvailability = $_POST['productAvailability'];
     $produk->productWeight = $_POST['productWeight'];
    $hasil = $produk->insertProduct();
    
    if($hasil[1] == 'Error'){
        echo $hasil[0];
        exit();
    }else{
        $image = new image();
        $image->imageType = "product";
        $image->imagePrimary = "Yes";
        $image->imageDescription = "no description";
        $image->imageHeaderId = $hasil[1];
        $image->imageName = $produk->productName;
        if($image->insertImages()){
            echo $hasil[0];
        }else{
            echo "<script>alert(\"Product Added! addPicture() failed.\");document.location = '../product.php?tab=product';</script>";
        }
    }