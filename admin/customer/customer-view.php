
<form action='customer.php?tab=customer' method="post">
                <h3>Customer Search</h3>
                    <table cellpadding=5>
                    <tr><td width=150> <input type=text name='search' value="<?php echo $_POST['search']; ?>" size=95 style="padding:5px;" required></td><td width=500><input type="submit" value="Search" class="submit-button"/></td></tr>
                    </table>
	    </form><br />
 <?php
		if(isset($_POST['search'])){
		    $searchWord = $_POST['search'];
                    $customerSearch = new customer();
                    
		    
		    ?>
		<h3>Search Result</h3>
		 
		    <?php
                    $customerSearchView = $customerSearch->searchCustomer($searchWord);
                    $citySearch = new city();

                    if($customerSearchView == 0){
                    	?>
                    	<p>Your search returned zero result.</p><br><br>
                    	<?php
                    }else{
                    	?>
 <table cellpadding="13"style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="200"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="150"><p align="center"><strong>Email</strong></p></td>
					<td width="100"><p align="center"><strong>Phone</strong></p></td>
					<td width="100"><p align="center"><strong>City</strong></p></td>
					<td width="100"><p align="center"><strong>Action</strong></p></td>
					</tr>

                    	<?php

					 for($i = 0; $i < count($customerSearchView); $i++){
					 	$citySearch->idCity = $customerSearchView[$i]->customerCity; 
					 	$citySearch->setVar();
					 	echo "<tr bgcolor=\"#fff\">";
		

		?>
		<td width="200"><p align="left"><?php echo $customerSearchView[$i]->customerName; ?></p></td>
		<td width="100"><p align="center"><?php echo $customerSearchView[$i]->customerEmail; ?></p></td>
		<td width="100"><p align="center"><?php echo $customerSearchView[$i]->customerPhone; ?></p></td>
		<td width="100"><p align="center"><?php echo $citySearch->cityName; ?></p></td>
		<td width="100"><p align="center"><a href="customer.php?tab=customer&&edit=yes&&idCustomer=<?php echo $customerSearchView[$i]->idCustomer; ?>" class="button1">View Detail</a></p></td>
		</tr>
<?php
					 }
					}
					 ?>
</table><br><br>
					 <?php

           }
	    ?>
	    <h3>Customer List</h3>
	    <table cellpadding="13"style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
				
					<tr bgcolor="#f3b72d">
					<td width="200"><p align="left"><strong>Customer Name</strong></p></td>
					<td width="150"><p align="center"><strong>Email</strong></p></td>
					<td width="100"><p align="center"><strong>Phone</strong></p></td>
					<td width="100"><p align="center"><strong>City</strong></p></td>
					<td width="100"><p align="center"><strong>Action</strong></p></td>
					</tr>
					<?php
						 $rowsPerPage = 10;
	                   $pageNum = 1;
	                   if(isset($_GET['page']))
	                   {
	                       $pageNum = $_GET['page'];
	                   }
	                   $offset = ($pageNum - 1) * $rowsPerPage;


						$customer = new customer();
						$customerView = $customer->viewCustomer($offset, $rowsPerPage);
						$city = new city();

					 for($i = 0; $i < count($customerView); $i++){
					 	$city->idCity = $customerView[$i]->customerCity; 
					 	$city->setVar();
    	
			echo "<tr bgcolor=\"#fff\">";
		

		?>
		<td width="200"><p align="left"><?php echo $customerView[$i]->customerName; ?></p></td>
		<td width="100"><p align="center"><?php echo $customerView[$i]->customerEmail; ?></p></td>
		<td width="100"><p align="center"><?php echo $customerView[$i]->customerPhone; ?></p></td>
		<td width="100"><p align="center"><?php echo $city->cityName; ?></p></td>
		<td width="100"><p align="center"><a href="customer.php?tab=customer&&edit=yes&&idCustomer=<?php echo $customerView[$i]->idCustomer; ?>" class="button1">View Detail</a></p></td>
		</tr>

		<?php

    }

?>
</table>
<div class="page-num-con">
<?php
    echo $customer->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
    <br>
</div> 