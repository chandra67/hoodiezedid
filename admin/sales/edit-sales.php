<?php
                		
					    $item_total = 0;


	$sales = new sales();
	$sales->idSales = $_GET['idSales'];
	$sales->setVar();
	$customer = new customer();
	$customer->idCustomer = $sales->idCustomer;
	$customer->setVar();
					    ?>
					     <h3>Sales Detail</h3>
                       <p><small><a href="sales.php">Sales</a> > <a href="#">Sales Detail</a></small></p><br>

                       <table cellpadding="10"  style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="200"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="100"><p align="center"><strong>Order Id</strong></p></td>
					<td width="100"><p align="center"><strong>Checkout Date</strong></p></td>
					<td width="130"><p align="center"><strong>Total</strong></p></td>
					<td width="100"><p align="center"><strong>State</strong></p></td>
					<td width="150"><p align="center"><strong>Action</strong></p></td>
					</tr>
					<tr bgcolor="#fff">
					<td width="200"><p align="left"><?php echo $customer->customerName; ?></p></td>
					<td width="100"><p align="center"><?php echo $sales->idSales; ?></p></td>
					<td width="100"><p align="center"><?php echo $sales->salesDate; ?></p></td>
					<td width="130"><p align="center">Rp <?php echo number_format($sales->totalPrice, 0, ',', '.'); ?>,-</p></td>
					<td width="100"><p align="center"><?php echo $sales->confirmationState; ?></p></td>
					<td width="150"><p align="center"><a href="##" class="button1">Confirm Payment</a></p></td>
					</tr>
</table><br>
					<table cellpadding="10" style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
					<tbody>
					<tr bgcolor="#f3b72d">
					<th width="200"><p align="left"><strong>Product Name</strong></p></th>
					<th width="100"><p align="center"><strong>Image</strong></p></th>
					<th width="100"><p align="center"><strong>Size</strong></p></th>
					<th width="100"><p align="center"><strong>Quantity</strong></p></th>
					<th width="100"><p align="center"><strong>Price</strong></p></th>
					</tr>
					    <?php

                	$salesProductAtCart = new salesproduct();
                	$salesProductAtCart->idSales = $sales->idSales;

                	$salesProductView = $salesProductAtCart->selectProduct();

   					$product = new product();
   					$stock = new stock();
   					 $city = new city();
	                $city->idCity = $customer->customerCity;
	                $city->setVar();

    				for($i = 0; $i < count($salesProductView); $i++){
    					$product->idProduct = $salesProductView[$i]->idProduct;
    					$product->setVarCart();
    					$stock->idStock = $salesProductView[$i]->idStock;
    					$stock->setVarCart();
    					$image = new image();
				        $image->imageType = 'product';
				        $image->imageHeaderId = $product->idProduct;
?>
					<tr>
						<td><p align="left"><?php echo $product->productName; ?></p></td>
						<td><p align="left"><img src="../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px"/></p></td>
						<td><p align="center"><?php echo $stock->stockName; ?></p></td>
						<td><p align="center"><?php echo $salesProductView[$i]->productQuantity ?></p></td>
						<td ><p align="center">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
					</tr>
<?php
						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
    				}
					
					?>	
						<tr>
						<td colspan="2"><p align="left">Shipping To <?php echo $city->cityName; ?></p></td>
						<td><p align="center"></p></td>
						<td><p align="center"></p></td>
						<td ><p align="center">Rp <?php echo number_format($city->cityShippingFee, 0, ',', '.'); ?>,-</p></td>
						</tr>
					<tr>
					<td colspan="5" align=right><strong>Total: </strong>Rp <?php echo number_format($item_total+$city->cityShippingFee, 0, ',', '.'); ?>,-</td>
					</tr>
					</tbody>
					</table>	<br><br>
					 <h3>Shipping Detail</h3><br>
					 <table cellpadding="10"  style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="180"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="250"><p align="left"><strong>Address</strong></p></td>
					<td width="100"><p align="center"><strong>Phone</strong></p></td>
					<td width="130"><p align="center"><strong>Email</strong></p></td>
					</tr>
					<tr bgcolor="#fff">
					<td width="180"><p align="left"><?php echo $customer->customerName; ?></p></td>
					<td width="250"><p align="left"><?php echo $customer->customerAddress; ?></p></td>
					<td width="100"><p align="center"><?php echo $customer->customerPhone; ?></p></td>
					<td width="130"><p align="center"><?php echo $customer->customerEmail; ?></p></td>
					</tr>
</table><br>