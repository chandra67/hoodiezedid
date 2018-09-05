<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/productModule.php";
    include "../../modul/imageModule.php";
    
   
    
    
    $produk = new product();
    $produk->idProduct = $_GET['productno'];
    
    $image = new image();
    $image->imageHeaderId = $produk->idProduct;
    $image->imageType = 'product';
    $imageView = $image->setVarImageAll();
     for($i = 0; $i < count($imageView); $i++){    
         $imageView[$i]->deleteImages();
     }
    
    if($produk->deleteProduct()){
            echo "<script>alert(\"Product Deleted!\");document.location = '../product.php?tab=product';</script>";
    }else{
            echo "<script>alert(\"Delete Failed!\");document.location = '../product.php?tab=product';</script>";
    }
