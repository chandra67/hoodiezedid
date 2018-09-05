 <?php
 	$confirmation = new confirmation();
	$confirmation->idConfirmation = $_GET['idConfirmation'];
	$confirmation->setVar();


 ?>



 <h3>Payment Confirmation Detail</h3>
                       <p><small><a href="sales.php?tab=confirmation">Confirmation</a> > <a href="#">Confirmation Detail</a></small></p><br>

                       <table cellpadding="10"  style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr >
						<td width="150"><p align="left">Name</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->confirmationName; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Email</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->confirmationEmail; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Order Id</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->idSales; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Bank Account Holder</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->pemilikRek; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Customer Bank</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->yourBank; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Transfer To Bank</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->toBank; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Total Payment</p></td>
						<td width="300"><p align="left">Rp <?php echo number_format($confirmation->totalPayment, 0, ',', '.'); ?>,-</p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Payment Date</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->paymentDate; ?></p></td>
					</tr>
					<tr >
						<td width="150"><p align="left">Confirmation Note</p></td>
						<td width="300"><p align="left"><?php echo $confirmation->confirmationNote; ?></p></td>
					</tr>
					

				</table><br>
				<p align="left"><a href="sales/delete-confirmation.php?idConfirmation=<?php echo $confirmation->idConfirmation; ?>" class="button1">Delete</a></p>