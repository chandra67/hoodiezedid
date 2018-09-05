<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='THANK YOU!';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    require_once('../modul/PHPMailer/class.phpmailer.php');
    
   
?>
            <div class="mobile-content">
            	<?php

        include 'category-menu.php';
      
   

                		if(isset($_SESSION["customer_signed_in"])){
					    $item_total = 0;
			?>
            	 <br><br>
					    <?php
	                $city = new city();
	                $city->idCity = $customer->customerCity;
	                $city->setVar();

	                		

                	$salesProductAtCart = new salesproduct();
                	$salesProductAtCart->idSales = $_SESSION["cart_item"];

                	$salesProductView = $salesProductAtCart->selectProduct();

   					$product = new product();
   					
   					$stock = new stock();
   					$orderdetail="";

    				for($i = 0; $i < count($salesProductView); $i++){
    					$product->idProduct = $salesProductView[$i]->idProduct;
    					$product->setVarCart();
    					$stock->idStock = $salesProductView[$i]->idStock;
    					$stock->setVarCart();
    					$image = new image();
				        $image->imageType = 'product';
				        $image->imageHeaderId = $product->idProduct;



					$orderdetail=$orderdetail."<tr>
						<td><p align=\"left\">".$product->productName."</p></td>
						<td><p align=\"left\"><img src=\"../uploaded_images/".$image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary()."\" width=\"80px\"/></p></td>
						<td><p align=\"center\">".$stock->stockName."</p></td>
						<td><p align=\"center\">".$salesProductView[$i]->productQuantity."</p></td>
						<td ><p align=\"center\">Rp ".number_format($product->productPrice, 0, ',', '.').",-</p></td>
						</tr>";

						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
    				}
					
					
						$orderdetail=$orderdetail."<tr>
										<td colspan=\"2\"><p align=\"left\">Shipping To ".$city->cityName."</p></td>
										<td><p align=\"center\"></p></td>
										<td><p align=\"center\"></p></td>
										<td ><p align=\"center\">Rp ".number_format($city->cityShippingFee, 0, ',', '.').",-</p></td>
										</tr>
									<tr>
									<td colspan=\"6\" align=right><strong>Total: </strong>Rp ".number_format($item_total+$city->cityShippingFee, 0, ',', '.').",-</td>
									</tr>
									</tbody>
									</table>";

						$shiping = "
						 <p align=\"center\"><b>SHIPPING DETAIL</b></p>
						<table cellpadding=3  style=\"margin: 0 auto;\">
	                		
                            <tr><td ><p align=left>NAME</p></td><td > <p>".$customer->customerName."</p></td></tr>
                            <tr><td ><p align=left>EMAIL</p></td><td> <p>".$customer->customerEmail."</p></td></tr>
                            <tr><td ><p align=left>PHONE</p></td><td > <p>".$customer->customerPhone."</p></td></tr>
                            
                            <tr><td ><p align=left>ADDRESS</p></td><td > <p>".$customer->customerAddress."</p></td></tr>
                             <tr><td ><p align=left>CITY</p></td><td> <p>".$city->cityName."</p></td></tr>
                            
                            </table><br>";

					
                         $payment = new setting();
                         $payment->idSetting = 'paymentDetail';
                         $payment->selectSetting();

                         $confirmation = new setting();
                         $confirmation->idSetting = 'confirmationDetail';
                         $confirmation->selectSetting();
			//notif
                	 $pesan = "<!DOCTYPE html>
                   <html>
                       <head>
                           <title>Meraki Receipt Notification</title>
                           <meta charset=\"UTF-8\">
                           <meta name=\"viewport\" content=\"width=device-width\"> </head>
                       <body>
                           <p align=\"center\"><img src=\"images/meraki.png\" width=\"500\"/></p>
                           <br>
                           <p align=\"center\">Dear ".$customer->customerName."</p>
                           <p align=\"center\"><b>ORDER DETAIL</b></p>
                           <p align=\"center\">Order Id: ".$salesProductAtCart->idSales."</p>
                           <p align=\"center\">Total: Rp ".number_format($item_total+$city->cityShippingFee, 0, ',', '.').",-</p><br>

                           <table cellpadding=\"10\" style=\"border-collapse: collapse; margin: 0 auto;\">
							<tbody>
							<tr bgcolor=\"#f3b72d\">
							<th><p align=\"left\"><strong>Product Name</strong></p></th>
							<th><p align=\"center\"><strong>Image</strong></p></th>
							<th><p align=\"center\"><strong>Size</strong></p></th>
							<th><p align=\"center\"><strong>Quantity</strong></p></th>
							<th><p align=\"center\"><strong>Price</strong></p></th>
							</tr>
                           ".$orderdetail."
                           <br><br>
                           ".$shiping."
                           <br>
                           <p align=\"center\"><b>PAYMENT DETAIL</b></p>
                           <div style=\"text-align: center;\">
                           ".$payment->settingDescription."
                           </div>
                           <p align=\"center\"><b>PAYMENT CONFIRMATION</b></p>
                           <div style=\"text-align: center;\">
                           	".$confirmation->settingDescription."
                           </div>
                       </body>
                   </html>";

				       $mail             = new PHPMailer(); // defaults to using php "mail()"

				       $body             = eregi_replace("[\]",'',$pesan);

				       
				       	$nama = "Meraki";
				       	$email = "info@meraki.co.id";
				       $mail->AddReplyTo($email,$nama);

				       $mail->SetFrom($email, $nama);

				       $mail->AddReplyTo($email,$nama);
				       
				        $address = $customer->customerEmail;
				        $mail->AddAddress($address , $customer->customerName);

				        $addresscc = "meraki.indo@gmail.com";
				        $mail->addCC($addresscc , $customer->customerName);

				       $mail->Subject    = "Meraki: Order Receipt";

				       $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

				       $mail->MsgHTML($body);
				       //////
				    
				    
				   
				    
				    if($mail->Send()){
				        echo "<p align=center>Thanks for your order, we will send you an email about your receipt.</p>";
				        $sales = new sales();
   						$sales->idSales = $salesProductAtCart->idSales;
   						$sales->idCustomer = $customer->idCustomer;
   						$sales->totalPrice = $item_total+$city->cityShippingFee;
				        $sales->checkout();

				        unset($_SESSION["cart_item"]);
				    }else{
				        echo "<p align=center>Error sending receipt.</p>";
				    }

				    

                	?>
					  <?php
					}else{

						?>
		                <div class="mid-content-box">
							<p align="center">Error empty cart.</p>

						<?php
					}

					?>
					<br>
                </div>
           
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>