<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='Invoice';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';

     include_once 'modul/salesModule.php';
     include 'modul/stockModule.php';

        $sales = new sales();
    $sales->idSales = $_GET['orderid'];
    $sales->setVar();
    $customer = new customer();
    $customer->idCustomer = $sales->idCustomer;
    $customer->setVar();
  
?>
<div class="menu" style="padding-top: 40px; text-align: left;">
    <a href="##" class="current">Order Detail #<?php echo str_pad(  $sales->idSales, 5, '0',STR_PAD_LEFT);  ?></a>
                    
                </div>
       <div class="content">
        <div class="mid-content">
             
               
                <?php
                        if(isset($_SESSION["customer_signed_in"])){
                        $item_total = 0;
            ?>
                 

                <div class="mid-content-box" style="padding-bottom: 0;">
                        
                    <table cellpadding="10" border="0" bordercolor="#372f2d" style="border-collapse: collapse; ">
                    <tbody>
                  <tr bgcolor="#372f2d" style="color: #fff; font-family: estre;">
                    <th colspan="2"><p align="left"><strong>Product</strong></p></th>
                <th><p align="right"><strong>Weight</strong></p></th>
                    <th><p align="center"><strong>Price</strong></p></th>
                    </tr>
                        <?php
                    $city = new city();
                    $city->idCity = $customer->customerCity;
                    $city->setVar();

                            

                    $salesProductAtCart = new salesproduct();
                    $salesProductAtCart->idSales =  $sales->idSales;;

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
                   <tr style="color:#3a3a3a;" <?php if($i % 2 == 1){ echo "bgcolor=\"#efefef\"";}else{echo "bgcolor=\"#fff\"";} ?>>
                        <td><p align="left"><img src="uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>" width="80px"/></p></td>
                        <td width="400"><p align="left"><span style="font-size:14px;"><b><?php echo $product->productName; ?></b></span></p></td>
                        
                        <td ><p align="right"><?php echo $product->productWeight; ?> Kg</p></td>
                        <td ><p align="right">Rp <?php echo number_format($product->productPrice, 0, ',', '.'); ?>,-</p></td>
                        </tr>
<?php
                    $item_total += $salesProductView[$i]->productQuantity * $product->productPrice;
                        $totalWeight += $product->productWeight;
                    }

                    $shipingCost = $totalWeight * $city->cityShippingFee;
                        $randNumber = str_pad( $salesProductAtCart->idSales*3, 3, '0',STR_PAD_LEFT);
                    
                    ?>  
                       <tr style="color:#3a3a3a;" bgcolor="#efefef">
                        <td colspan="2"><p align="left">Shipping To <?php echo $city->cityName; ?></p></td>
                        <td ><p align="right">Rp <?php echo number_format($city->cityShippingFee, 0, ',', '.'); ?>,- x <?php echo $totalWeight; ?> Kg</p></td>
                        <td ><p align="right">Rp <?php echo number_format($shipingCost, 0, ',', '.'); ?>,-</p></td>
                        </tr>
                        <tr style="color:#3a3a3a;" bgcolor="#ffffff">
                        <td colspan="3"><p align="left">Unique Code</p></td>
                        
                        <td ><p align="right">Rp <?php echo $randNumber ; ?>,-</p></td>
                        </tr>
                    <tr>
                    <td colspan="6"><span style="float:left;"><b>Order Total:</b></span><span style="float:right;"><strong>Rp <?php echo number_format($item_total+$shipingCost+$randNumber, 0, ',', '.'); ?>,-</strong></span></td>
                    </tr>
                    </tbody>
                    </table>
                    <?php }else{ echo "Login required for seeing this page.";} ?>
            </div>
        </div>
        </div>
                
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>