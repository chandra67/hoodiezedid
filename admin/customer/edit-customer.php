 <h3>Customer Detail</h3>
 <p><small><a href="customer.php">Customer</a> > <a href="#">Customer Detail</a></small></p><br>
 <?php
 	$customer = new customer();
 	$customer->idCustomer = $_GET['idCustomer'];
 	$customer->setVar();

 ?>
<form name="changePicture" action='change-picture.php' method="post" enctype='multipart/form-data'>
                   
                     <table cellpadding="3">
                         <tr>
                             <td><img src="crop.php?h=150&w=150&f=../<?php echo $customer->viewImage();?>"/></td>
                              </tr>
                     </table>
                     
                 </form><br /><br>

    <?php
  $city = new city();
  $city->idCity = $customer->customerCity;
    $city->setVar();
  ?>
                 <form name="changeName" action='customer/update-information.php?idCustomer=<?php echo $customer->idCustomer; ?>' method="post" >
                        <p>ACCOUNT INFORMATION</p>
                            <table cellpadding=5 width="580">
                            <tr><td width=200><p align=left>NAME</p></td><td width=500> <input class="subs-input" type=text name='customerName' size=25 value="<?php echo $customer->customerName;?>" required></td></tr>
                            <tr><td width=200><p align=left>EMAIL</p></td><td width=500> <?php echo $customer->customerEmail;?></td></tr>
                            <tr><td width=200><p align=left>PHONE</p></td><td width=500> <input class="subs-input" type=text name='customerPhone' size=25 value="<?php echo $customer->customerPhone;?>" required></td></tr>
                            
                            <tr><td width=200><p align=left>ADDRESS</p></td><td width=500> <textarea class="textarea-input" name="customerAddress" cols="40" rows="5"><?php echo $customer->customerAddress;?></textarea></td></tr>
                             <tr><td width=200><p align=left>CITY</p></td><td width=500> 
                                <select name="customerCity" class="subs-input">
                                    <option value="<?php echo $customer->customerCity; ?>"><?php echo $city->cityName; ?> (selected)</option>

<?php
$cityArray = $city->viewCity();
  for($i = 0; $i < count($cityArray); $i++){
?>
                      <option value="<?php echo $cityArray[$i]->idCity; ?>"><?php echo $cityArray[$i]->cityName; ?></option>
                      <?php
                    }
                      ?>
                                </select>


                             </td></tr>
                           
                            <tr><td></td><td><p align=left><input type="submit" value="Update Customer Information" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br /><br>
             