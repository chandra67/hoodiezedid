

<table cellpadding="10"style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="30"><p align="center"><strong>No</strong></p></td>
					<td width="200"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="100"><p align="center"><strong>Order Id</strong></p></td>
					<td width="100"><p align="center"><strong>Checkout Date</strong></p></td>
					<td width="100"><p align="center"><strong>Product</strong></p></td>
					<td width="130"><p align="center"><strong>Total</strong></p></td>
					<td width="100"><p align="center"><strong>State</strong></p></td>
					<td width="100"><p align="center"><strong>Action</strong></p></td>
					</tr>
<?php
	$rowsPerPage = 15;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
	$pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

	$sales = new sales();
	$salesProduct = new salesproduct();
	$salesView = $sales->setVarSales($offset, $rowsPerPage);

	$customer = new customer();
   
    for($i = 0; $i < count($salesView); $i++){
    	
			echo "<tr bgcolor=\"#fff\">";
		

		$customer->idCustomer = $salesView[$i]->idCustomer;
		$customer->setVar();
		$salesProduct->idSales = $salesView[$i]->idSales;
		?>
		<td width="30"><p align="center"><?php echo $i+1; ?></p></td>
		<td width="200"><p align="left"><?php echo $customer->customerName; ?></p></td>
		<td width="100"><p align="center"><?php echo $salesView[$i]->idSales; ?></p></td>
		<td width="100"><p align="center"><?php echo $salesView[$i]->salesDate; ?></p></td>
		<td width="100"><p align="center"><?php echo $salesProduct->cekRowPerSales(); ?> Product(s)</p></td>
		<td width="130"><p align="center">Rp <?php echo number_format($salesView[$i]->totalPrice, 0, ',', '.'); ?>,-</p></td>
		<td width="100"><p align="center"><?php echo $salesView[$i]->confirmationState; ?></p></td>
		<td width="100"><p align="center"><a href="sales.php?tab=sales&&edit=yes&&idSales=<?php echo $salesView[$i]->idSales; ?>" class="button1">View Detail</a></p></td>
		</tr>

		<?php

    }

?>
				</table>
<div class="page-num-con">
<?php
    echo $sales->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
    <br>
</div> 