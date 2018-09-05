<?php
include "modul/mainFunction.php";
connect();
include "modul/customerModule.php";
   include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/stockModule.php';
     include_once 'modul/salesModule.php';
 $customer = new customer();

$salesproduct = new salesproduct();
			$salesproduct->idSales = $_SESSION["cart_item"];
			if(!$salesproduct->deleteSalesProductPerSales()){
					echo "<script>alert(\"error remove sales product!\");</script>";
					break;
				}
			$sales = new sales();
				$sales->idSales = $_SESSION["cart_item"];
				if(!$sales->deleteSales()){
					echo "<script>alert(\"error remove cart!\");</script>";
					break;
				}else{
					unset($_SESSION["cart_item"]);
				}

$customer->signOut();
?>
