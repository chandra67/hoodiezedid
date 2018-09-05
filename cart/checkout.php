<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='none';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    
    $coupon = "no";
    $text = "";
    $text2 = "Apply";
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
     		$code = new code();
			$code->voucherCode = $_POST["voucherCode"];
			if($code->cekCode() > 0){
				$code->setVar();	
				$text = "Congratulations! You got ".$code->codeDiscount."% Discount.";
				$text2 = "Change";
				$coupon = "yes";
			}else{
				$text = "Ooops!, Your code doesn't work :( or its already used.";
					 $coupon = "no";
			}


     }
?>
<div class="menu" style="padding-top: 40px;text-align: left;">
                    <p><a href="##" class="current">Checkout</a></p>
                </div>
        <div class="content">
           
            <div class="mid-content">
            	<?php

     
      		
   	if(isset($_GET["reg"])){
   		echo "<script>alert(\"<Congratulations! You are now registered.
        Now you can login to checkout your cart!\");</script>";
   	}
?>
			<?php
                		if(isset($_SESSION["customer_signed_in"])){
					    $item_total = 0;
			?>
            	 

                <div class="mid-content-box">
                		
					<table cellpadding="10" border="0" bordercolor="#372f2d" style="border-collapse: collapse; ">
					<tbody>
					<tr bgcolor="#372f2d" style="color: #f7be2f; ">
					<th colspan="2"><p align="left"><strong>Product</strong></p></th>
					<th><p align="center"><strong>Size</strong></p></th>
					<th><p align="center"><strong>Quantity</strong></p></th>
					<th><p align="center"><strong>Weight</strong></p></th>
					<th><p align="center"><strong>Price</strong></p></th>
					</tr>
					    <?php
	                $city = new city();
	                $city->idCity = $customer->customerCity;
	                $city->setVar();

	                		

                	$salesProductAtCart = new salesproduct();
                	$salesProductAtCart->idSales = $_SESSION["cart_item"];

                	$salesProductView = $salesProductAtCart->selectProduct();

   					$product = new product();
   					$stock = new stock();
   					$totalWeight = 0;

    				for($i = 0; $i < count($salesProductView); $i++){
    					$product->idProduct = $salesProductView[$i]->idProduct;
    					$product->setVarCart();
    					$stock->idStock = $salesProductView[$i]->idStock;
    					$stock->setVarCart();
    					$image = new image();
				        $image->imageType = 'product';
				        $image->imageHeaderId = $product->idProduct;
?>
					<tr <?php if($i % 2 == 1){ echo "bgcolor=\"#efefef\"";} ?>>
						<td><p align="left"><img src="../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px"/></p></td>
						<td width="700"><p align="left"><span style="font-size:14px;"><?php echo $product->productName; ?></span></p></td>
						
						<td width="50"><p align="center"><?php echo $stock->stockName; ?></p></td>
						<td width="80"><p align="center"><?php echo $salesProductView[$i]->productQuantity ?></p></td>
						<td width="80"><p align="center"><?php echo$product->productWeight ?> Kg</p></td>
						<td width="100"><p align="center">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
						</tr>
<?php
						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
						$totalWeight += $product->productWeight;
    				}

					$shipingCost = ceil($totalWeight) * $city->cityShippingFee;
					$randNumber = str_pad( $salesProductAtCart->idSales*3, 3, '0',STR_PAD_LEFT);


					if ($coupon == 'yes') {
						$diskon = ($code->codeDiscount/100) * $item_total;
						$item_total = $item_total - $diskon;
					}else{
						$diskon = 0;
					}

					$item_total +=$randNumber;
					?>	
						<tr>
					<td colspan="5" align=right><form action="" method="post"><?php echo $text; ?> <input name="voucherCode" type="text" class="subs-input" style="width: 130px;text-align: center;" value="<?php echo $_POST["voucherCode"]; ?>" placeholder="Discount Code" required> <input type="submit" value="<?php echo $text2; ?> Code" class="removecart2"></form></td>
					<td align=right>- Rp <?php echo number_format($diskon, 0, ',', '.'); ?>,-</td>
					</tr>
						<tr>
						<td colspan="5"><p align="right">Shipping To <?php echo $city->cityName; ?> (Rp <?php echo number_format($city->cityShippingFee, 0, ',', '.'); ?> x <?php echo $totalWeight; ?> Kg)</p></td>
						
						<td ><p align="right">Rp <?php echo number_format($shipingCost, 0, ',', '.'); ?>,-</p></td>
						</tr>
							<tr >
						<td colspan="5"><p align="right">Unique Code: </p></td>
						
						<td ><p align="right">Rp <?php echo $randNumber ; ?>,-</p></td>
						</tr>
					<tr>
						<td colspan="5"><p align="right">Order Total:</p></td>
						
						<td ><p align="right">Rp <?php echo number_format($item_total+$shipingCost, 0, ',', '.'); ?>,-</p></td>
					
					</tr>
					</tbody>
					</table>
				</div>
	
					

	                <div class="mid-content-box"  style="padding-bottom: 120px;" >
	                	<table width="1170"  border="0" cellpadding="10" style="border-collapse: collapse;  ">
	                		<tr bgcolor="#372f2d" style="color: #f7be2f; ">
					<th colspan="2"><p align="left"><strong>Shipping Address</strong></p></th>
				
					</tr>
	                		
                            <tr bgcolor="#efefef"><td width="30"><p align=left><b>Name</b></p></td><td width="1000"> <p><?php echo $customer->customerName;?></p></td></tr>
                            <tr ><td ><p align=left><b>Email</b></b></p></td><td > <p><?php echo $customer->customerEmail;?></p></td></tr>
                            <tr bgcolor="#efefef"><td ><p align=left><b>Phone</b></p></td ><td > <p><?php echo $customer->customerPhone;?></p></td></tr>
                            
                            <tr><td ><p align=left><b>Address</b></p></td><td> <p><?php echo $customer->customerAddress;?></p></td></tr>
                             <tr bgcolor="#efefef"><td ><p align=left><b>City</b></p></td><td > <p><?php echo $city->cityName;?></p></td></tr>
                            
                            </table><br><br>
					<p align="left"><a class="removecart" href="cart.php">Back</a>	<a class="removecart" href="thankyou.php?coupon=<?php echo $coupon; ?>&code=<?php echo $_POST["voucherCode"]; ?>">Confirm your order</a></p>
					  <?php
					}else{

						?>
						

		                <div class="mid-content-box">
							
								<?php

								   if($_GET['reg']){

?>
<div class="checkout-left" style="text-align: center;width: 1100px;" >
        <p><b>Congratulations!</b> You are now registered. <br>
        Now you can login by fill up the form below</p><br>
        <form action="../signin.php?link=cart/checkout.php" method="post" name="SignIn" onSubmit="return validateLoginForm();">
					           
					                <p><input name="email" type="text" class="subs-input" placeholder="Email" required></p>
					           
					                <input type="hidden" name="link" value="cart/checkout.php" />
					                <p><input name="password" type="password" placeholder="Password" class="subs-input" required></p><br>
					                <p><input type="submit" value="LOGIN" class="register-login"></p>
					                <br>
					            </form>
					            </div>
 <?php
        }else{

        	?>

        			<div class="checkout-left">
								<p>NEW CUSTOMER</p><br>
								<a class="removecart" href="../signup.php?link=cart/checkout.php?reg=true">REGISTER NEW ACCOUNT</a><br><br>
								<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
							</div>
							<div class="checkout-right">
								<p>RETURNING CUSTOMER</p>

									<form action="../signin.php?link=cart/checkout.php" method="post" name="SignIn" onSubmit="return validateLoginForm();">
					           
					                <p><input name="email" type="text" class="subs-input" placeholder="Email" required></p>
					           
					                <input type="hidden" name="link" value="cart/checkout.php" />
					                <p><input name="password" type="password" placeholder="Password" class="subs-input" required></p><br>
					                <p><input type="submit" value="LOGIN" class="register-login"></p>
					                <br>
					            </form>
							</div>



        	<?php
        }
  ?> 
							

						<?php
					}

					?>
                </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>