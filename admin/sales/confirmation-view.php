

<table cellpadding="13"style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="30"><p align="center"><strong>No</strong></p></td>
					<td width="200"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="100"><p align="center"><strong>Order Id</strong></p></td>
					<td width="100"><p align="center"><strong>Payment Date</strong></p></td>
					<td width="130"><p align="center"><strong>Total</strong></p></td>
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

	$confirmation = new confirmation();
	$confirmationView = $confirmation->selectConfirmation($offset, $rowsPerPage);

	
   
    for($i = 0; $i < count($confirmationView); $i++){
    	
			echo "<tr bgcolor=\"#fff\">";
		
		?>
		<td width="30"><p align="center"><?php echo $i+1; ?></p></td>
		<td width="200"><p align="left"><?php echo $confirmationView[$i]->confirmationName; ?></p></td>
		<td width="100"><p align="center"><?php echo $confirmationView[$i]->idSales; ?></p></td>
		<td width="100"><p align="center"><?php echo $confirmationView[$i]->paymentDate; ?></p></td>
		<td width="130"><p align="center">Rp <?php echo number_format($confirmationView[$i]->totalPayment, 0, ',', '.'); ?>,-</p></td>
		<td width="100"><p align="center"><a href="sales.php?tab=confirmation&&edit=yes&&idConfirmation=<?php echo $confirmationView[$i]->idConfirmation; ?>" class="button1">View Detail</a></p></td>
		</tr>

		<?php

    }

?>
				</table>
<div class="page-num-con">
<?php
    echo $confirmation->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
    <br>
</div> 