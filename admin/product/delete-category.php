<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/productModule.php";
    
   
    
  $product = new product();
  $product->productType = $_GET['productType'];
  
  if($product->deleteCat()){
         echo "<script>alert(\"Category Deleted!\");document.location = '../product.php?tab=addnew&&category=yes';</script>";
    }else{
        echo "<script>alert(\"Delete Failed!\");document.location = '../product.php?tab=addnew&&category=yes';</script>";
    }
