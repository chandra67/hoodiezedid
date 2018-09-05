<?php
	session_start();
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='YOUR BAG';
    
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
            <div class="mobile-content">
            	<?php

        include 'category-menu.php';
      
   
?>
                		<?php
                		if(isset($_SESSION["cart_item"])){
					    $item_total = 0;
					    ?>
					    <br><br>
					<table cellpadding="10" border="1" bordercolor="#f3b72d" style="border-collapse: collapse; width: 100%;">
					<tbody>
					<tr bgcolor="#f3b72d">
					<th><p align="center" style="font-size: 3.5vw;"><strong>Product</strong></p></th>
					<th><p align="center" style="font-size: 3.5vw;"><strong>Size</strong></p></th>
					<th><p align="center" style="font-size: 3.5vw;"><strong>Price</strong></p></th>
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
					<tr>
						<td><p align="center" style="font-size: 3.5vw;"><img src="../../../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px"/><br><b><?php echo $product->productName; ?></b></p>
							<p align="center" style=" margin-top: 10px;"><a href="../../shop/cart/?action=remove&code=<?php echo $salesProductView[$i]->idSalesProduct; ?>" class="removecart">Remove Item</a></p>
						</td>
						<td><p align="center" style="font-size: 3.5vw;"><?php echo $stock->stockName; ?></p></td>
						<td ><p align="center" style="font-size: 3.5vw;">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
					
					</tr>
<?php
						$item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
    				}
					
					?>	
						
					<tr>
					<td colspan="2" align=left style="font-size: 3.5vw;"><strong>Sub total</strong></td>
					<td colspan="2" align=left style="font-size: 3.5vw;"><strong>Rp <?php echo number_format($item_total, 0, ',', '.'); ?>,-</strong></td>
					</tr>
					</tbody>
					</table><br><br>	

					<p align="center"><a class="removecart" href="../../shop/checkout/">Proceed To Checkout</a></p>
					  <?php
					}else{

						echo "<p align=center>Your bag is empty</p>";
					}

					?>
                </div>
           
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>