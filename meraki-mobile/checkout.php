<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='CHECKOUT';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    
   
?>
            <div class="mobile-content">
            	<?php

        include 'category-menu.php';
      		
   	if(isset($_GET["reg"])){
   		echo "<script>alert(\"<Congratulations! You are now registered.
        Now you can login to checkout your cart!\");</script>";
   	}
?>
			<?php
                		if(isset($_SESSION["customer_signed_in"])){
					    $item_total = 0;
			?>
            	 <br><br>
            	  <p align="center"><b>REVIEW YOUR ORDER</b></p><br>
                		
					<table cellpadding="10" border="1" bordercolor="#f3b72d" style="border-collapse: collapse; width: 100%;">
					<tbody>
					<tr bgcolor="#f3b72d">
					<th><p align="center" style="font-size: 3.5vw;"><strong>Product</strong></p></th>
					<th><p align="center" style="font-size: 3.5vw;"><strong>Size</strong></p></th>
					<th><p align="center" style="font-size: 3.5vw;"><strong>Price</strong></p></th>
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
						<td><p align="center" style="font-size: 3.5vw;"><img src="../../../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px"/><br><b><?php echo $product->productName; ?></b></p></td>
						<td><p align="center" style="font-size: 3.5vw;"><?php echo $stock->stockName; ?></p></td>
						<td ><p align="center" style="font-size: 3.5vw;">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
						</tr>
<?php
						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
    				}
					
					?>	
						<tr>
						<td colspan="2"><p align="left" style="font-size: 3.5vw;">Shipping To <?php echo $city->cityName; ?></p></td>
						
						<td ><p align="center" style="font-size: 3.5vw;">Rp <?php echo number_format($city->cityShippingFee, 0, ',', '.'); ?>,-</p></td>
						</tr>
					<tr>
					<td colspan="3"><span style="float:left;font-size: 3.5vw;"><b>Order Total:</b></span><span style="float:right;font-size: 3.5vw;"><strong>Rp <?php echo number_format($item_total+$city->cityShippingFee, 0, ',', '.'); ?>,-</strong></span></td>
					</tr>
					</tbody>
					</table>
					<br><br>
	                    <p align="center"><b>SHIPPING ADDRESS</b></p><br>
	                
	                	<table cellpadding=5  style="margin: 0 auto; width:100%;">
	                		
                            <tr><td ><p align=left style="font-size: 3.5vw;">NAME</p></td><td > <p style="font-size: 3.5vw;"><?php echo $customer->customerName;?></p></td></tr>
                            <tr><td ><p align=left style="font-size: 3.5vw;">EMAIL</p></td><td > <p style="font-size: 3.5vw;"><?php echo $customer->customerEmail;?></p></td></tr>
                            <tr><td ><p align=left style="font-size: 3.5vw;">PHONE</p></td><td > <p style="font-size: 3.5vw;"><?php echo $customer->customerPhone;?></p></td></tr>
                            
                            <tr><td ><p align=left style="font-size: 3.5vw;">ADDRESS</p></td><td > <p style="font-size: 3.5vw;"><?php echo $customer->customerAddress;?></p></td></tr>
                             <tr><td ><p align=left style="font-size: 3.5vw;">CITY</p></td><td > <p style="font-size: 3.5vw;"><?php echo $city->cityName;?></p></td></tr>
                            
                            </table><br>
					<p align="center"><a class="removecart" href="../../shop/cart/">Back</a>	<a class="removecart" href="../../shop/thankyou/">Place your order</a></p><br><br>
					  <?php
					}else{

						?>
		               
							<br>
								<p style="text-align: center;">RETURNING CUSTOMER</p><br>
								<form action="../../signin.php?link=shop/checkout/" method="post" name="SignIn" onSubmit="return validateLoginForm();">
					                
					                <p><input name="email" type="text" value="EMAIL" onFocus="HideLogin(this)"  onBlur="ShowLogin(this)" class="login-input" required></p>
					           
					                <input type="hidden" name="link" value="shop/checkout/" />
					                <p><input name="password" type="password" value="password" onFocus="HidePass(this)"  onBlur="ShowPass(this)" class="login-input" required></p>
					                <p><input type="submit" value="LOGIN" class="login-submit"></p>
					                <br>
					            </form><br>
					            <p style="text-align: center;">I AM A NEW CUSTOMER</p><br>
								<p style="text-align: center;"><a class="removecart" href="../../signup.php?link=shop/checkout/?reg=true">REGISTER NEW ACCOUNT</a></p><br>
								<p style="font-size: 3.5vw;text-align: center;">By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
							

						<?php
					}

					?>
                </div>
           
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>