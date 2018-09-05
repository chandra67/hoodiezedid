<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='Shop';
    include 'header-up.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
    require_once('../modul/PHPMailer/class.phpmailer.php');
    
   include '../product/category-menu.php';


   $coupon = $_GET['coupon'];
   if($coupon = 'yes'){
   		$code = $_GET['code'];
   }
?>
        <div class="content">
           
            <div class="mid-content">
            	<?php

        
      
   

                		if(isset($_SESSION["customer_signed_in"])){
					    $item_total = 0;
			?>
            	 <div class="title-center">
                    <a href="##"><b>THANK YOU!</b></a>
                </div>

                <div class="mid-content-box">
					
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
   					$totalWeight = 0;

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
						<td><p align=\"left\"><img src=\"uploaded_images/".$image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary()."\" width=\"80px\"/></p></td>
						<td><p align=\"center\">".$stock->stockName."</p></td>
						<td><p align=\"center\">".$salesProductView[$i]->productQuantity."</p></td>
						<td ><p align=\"center\">Rp ".number_format($product->productPrice, 0, ',', '.').",-</p></td>
						</tr>";

						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
						$totalWeight += $product->productWeight;
    				}

    				$shipingCost = ceil($totalWeight) * $city->cityShippingFee;
					$randNumber = str_pad( $salesProductAtCart->idSales*3, 3, '0',STR_PAD_LEFT);
					$item_total +=$randNumber;


					
					
						$orderdetail=$orderdetail."<tr>
										<td colspan=\"4\"><p align=\"left\">Shipping To ".$city->cityName."</p></td>
										<td ><p align=\"center\">Rp ".number_format($city->cityShippingFee, 0, ',', '.').",-</p></td>
										</tr>
									<tr>
									<td colspan=\"6\" align=right><strong>Rp ".number_format($item_total+$city->cityShippingFee, 0, ',', '.').",-</strong></td>
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
                       <div id=\"wrapper\" style=\"width: 500px; height:auto; overflow: auto; font-family: Century Gothic; margin: 0 auto;\">
                           <p align=\"center\"><img src=\"images/meraki.png\" width=\"500\"/></p>
                           <br>
                           <p align=\"center\" style=\"font-size: 14px;\"><b>ORDER CONFIRMATION</b></p>
                           <br>
                           <p align=\"center\" style=\"font-size: 25px; color: #f3b72d;\"><b>Hello ".$customer->customerName.",</b></p>
                           <p align=\"center\">Thank you for your support by shopping at MERAKI,</p>
							<p align=\"center\">please read and follow the next step to complete your order.</p>
							<br><br>
                           <p align=\"left\" style=\"color: #f3b72d;\"><b>Details</b></p>
                           <div style=\" border-top: 1px solid #f3b72d; border-bottom: 1px solid #f3b72d; padding-top: 5px; padding-bottom: 5px;\">
                           <p align=\"left\">Order Id #".$salesProductAtCart->idSales."</p>
                           </div>
                           <br>
                           <table cellpadding=\"10\" border=\"0\" bordercolor=\"#f3b72d\" style=\"border-color: #f3b72d; border-collapse: collapse; margin: 0 auto;\">
							<tbody>
							<tr bgcolor=\"#f3b72d\">
							<th width=\"150\"><p align=\"left\"><strong>Product Name</strong></p></th>
							<th width=\"100\"><p align=\"center\"><strong>Image</strong></p></th>
							<th width=\"70\"><p align=\"center\"><strong>Size</strong></p></th>
							<th width=\"80\"><p align=\"center\"><strong>Quantity</strong></p></th>
							<th width=\"100\"><p align=\"center\"><strong>Price</strong></p></th>
							</tr>
							
	                           ".$orderdetail."
	                           <br><br>
	                        <div style=\" border-top: 1px solid #f3b72d; border-bottom: 1px solid #f3b72d; padding-top: 10px; padding-bottom: 10px;\">
	                          
	                           <p align=\"left\">WHERE TO PAY:</p>
	                           <div style=\"text-align: left;\">
	                           <b>".$payment->settingDescription."</b>
	                           </div>
	                           <p align=\"left\">PAYMENT CONFIRMATION</p>
	                           <div style=\"text-align: left; color: #000, text-decoration: none;\">
	                           	".$confirmation->settingDescription."
	                           </div>
	                         </div>
	                         <p align=\"left\">Hoodiezed</p>
	                         <p align=\"left\" style=\"color: #000, text-decoration: none;\"><b>www.hoodiezed.com</b></p>
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

				       $mail->Subject    = "Hoodiezed Order Receipt";

				       $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

				       $mail->MsgHTML($body);
				       //////
				    
				    
				
				    
				   // if($mail->Send()){
				        echo "<p align=center>Thanks for your order, we will send you an email about your receipt.</p>";
				        $sales = new sales();
   						$sales->idSales = $salesProductAtCart->idSales;
   						$sales->idCustomer = $customer->idCustomer;
   						if ($coupon = 'yes') {
   							$sales->idDiscount = $code;
   						}else{
   							$sales->idDiscount = '-';
   						}
   						$sales->totalPrice = $item_total+$shipingCost;
				        $sales->checkout();

				        unset($_SESSION["cart_item"]);
				   // }else{
				   //     echo "<p align=center>Error sending receipt.</p>";
				   // }

				    

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
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>