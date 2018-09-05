<?php
include "modul/mainFunction.php";
connect();
include "modul/customerModule.php";
 $customer = new customer();
$customer->idCustomer = $_SESSION['idCustomer'];
 $customer->updatePicture();
?>
