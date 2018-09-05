<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='none';
    
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/stockModule.php';
     include_once '../modul/salesModule.php';
    
    
 
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
				if(empty($_SESSION["cart_item"])){

					$sales = new sales();
					$sales->idCustomer = "0";
					$sales->checkoutState = "no";
					$sales->confirmationState = "unconfirmed";
					$sales->totalPrice = "0";
					$sales->idConfirmation = "0";

					$result = $sales->insertSales();
					if($result != false){
						$_SESSION["cart_item"] = $result;
					}else{
						 echo "<script>alert(\"error add sales!\");</script>";
						break;
					}
				}

				$salesproduct = new salesproduct();
				$salesproduct->idProduct = $_GET["code"];
				$salesproduct->idStock = $_POST["idStock"];
				$salesproduct->productQuantity = $_POST["productQuantity"];
				$salesproduct->idSales = $_SESSION["cart_item"];
				$resultAddProduct = $salesproduct->insertSalesProduct();
				if(!$resultAddProduct){
					echo "<script>alert(\"error add sales product!\");</script>";
					break;
				}else{
					echo "<script>document.location='cart.php';</script>";
				}
				
		break;
		case "remove":
			$salesproduct = new salesproduct();
			$salesproduct->idSales = $_SESSION["cart_item"];
			$salesproduct->idSalesProduct = $_GET["code"];
			if(!$salesproduct->deleteSalesProduct()){
					echo "<script>alert(\"error remove sales product!\");</script>";
					break;
				}

			if($salesproduct->cekRowPerSales() == 0){
				$sales = new sales();
				$sales->idSales = $_SESSION["cart_item"];
				if(!$sales->deleteSales()){
					echo "<script>alert(\"error remove cart!\");</script>";
					break;
				}else{
					unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
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
		break;	
		
	}
}

include 'header-up.php';
?>
<div class="menu" style="padding-top: 40px; text-align: left;">
                    <p><a href="##" class="current">Your Cart</a></p>
                </div>
        <div class="content" >
           
            <div class="mid-content">
            	<?php

        include 'category-menu.php';
      
   
?>

                <div class="mid-content-box">
                		<?php
                		if(isset($_SESSION["cart_item"])){
					    $item_total = 0;
					    ?>
					<table cellpadding="10" border="0" bordercolor="#372f2d" style="border-collapse: collapse;  ">
					<tbody>
					<tr bgcolor="#372f2d" style="color: #f7be2f;">
					<th colspan="2"><p align="left"><strong>Product</strong></p></th>
					<th><p align="center"><strong>Action</strong></p></th>
					<th><p align="center"><strong>Size</strong></p></th>
					<th><p align="center"><strong>Quantity</strong></p></th>
					
					
					<th><p align="center"><strong>Price</strong></p></th>
					</tr>
					    <?php

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
					<tr <?php if($i % 2 == 1){ echo "bgcolor=\"#efefef\"";} ?> >
						<td><p align="center"><img src="../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px" </p></td>
						<td width="650"><p align="left"><?php echo $product->productName; ?></p></td>
						<td width="130"><p align="center"><a href="cart.php?action=remove&code=<?php echo $salesProductView[$i]->idSalesProduct; ?>" class="removecart">Remove Item</a></p></td>
						<td><p align="center"><?php echo $stock->stockName; ?></p></td>
						<td><p align="center"><?php echo $salesProductView[$i]->productQuantity ?></p></td>
						
						
						<td ><p align="right">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
					</tr>
<?php
						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
    				}
					

					?>	
					
					<tr>
					<td colspan="5" align=right><strong>Sub Total:</strong></td>
					<td colspan="2" align=right><strong>Rp <?php echo number_format($item_total, 0, ',', '.'); ?>,-</strong></td>
					</tr>
				
					</tbody>
					</table><br><br>	
					

					<p align="left"><a class="removecart" href="checkout.php">Proceed To Checkout</a></p>
					  <?php
					}else{

						echo "<p align=left>Your cart is empty</p>";
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