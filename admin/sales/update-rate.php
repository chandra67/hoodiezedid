<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/customerModule.php";

     $city = new city();
       $city->idCity = $_POST['idCity'];
     $city->cityShippingFee = $_POST['cityShippingFee'];
     
     if($city->updateFee()){
         echo "<script>alert(\"Shipping Fee updated!\");document.location = '../sales.php?tab=shipping';</script>";
     }else{
        echo "<script>alert(\"Failed to update Shipping Fee!\");document.location = '../sales.php?tab=shipping';</script>";
     }

    
     


