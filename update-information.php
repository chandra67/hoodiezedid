<?php
include "modul/mainFunction.php";
connect();
include "modul/customerModule.php";
 $customer = new customer();
$customer->idCustomer = $_SESSION['idCustomer'];
 
if($customer->updateUser()){			
   						 echo "<script>alert(\"Information Updated!\");document.location = 'account-setting.php';</script>";
					}else{
						echo "<script>alert(\"Update Failed! Database Error\");document.location = 'account-setting.php';</script>";
					}
?>
