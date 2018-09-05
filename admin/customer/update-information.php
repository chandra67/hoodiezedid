<?php
include "../../modul/mainFunction.php";
connect();
include "../../modul/customerModule.php";
 $customer = new customer();
$customer->idCustomer = $_GET['idCustomer'];
 
if($customer->updateUser()){			
   						 echo "<script>alert(\"Information Updated!\");document.location = '../customer.php?tab=customer&&edit=yes&&idCustomer=".$customer->idCustomer."';</script>";
					}else{
						echo "<script>alert(\"Update Failed! Database Error\");document.location = '../customer.php?tab=customer&&edit=yes&&idCustomer=".$customer->idCustomer."';</script>";
					}
?>
