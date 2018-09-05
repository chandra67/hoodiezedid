<?php
    include "modul/mainFunction.php";
    connect();
    include "header.php";
     include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/stockModule.php';
     include_once 'modul/salesModule.php';
    
 if($_SESSION['customer_signed_in']==false)
    {
        echo "<script>document.location = 'signin.php?link=confirmation.php';</script>";
    }

  
?>
 <div class="menu" style="padding-top: 40px; text-align: left;">
  <a href="account-setting.php" >Your Account</a>
               <a href="change-pass-view.php" >Change Password</a>
                <a href="confirmation.php" class="current">Confirmation</a>
                <a href="history.php">History</a></div>
              
        
    <div class="content">

      <div class="mid-content">
         
          <div class="mid-content-box" style="text-align: left;">
             <?php
                if(isset($_GET['confirm'])){

                   $sales = new sales();
                    $sales->idSales = $_GET['orderid'];
                    $sales->setVar();


                    ?>
                     <form action="history.php" method="post" name="SignUp2" >
                       Invoice Number<br>
                       <b>#<?php echo str_pad(  $sales->idSales, 5, '0',STR_PAD_LEFT); ?></b><br><br>

                        Tagihan<br>
                       <b>Rp <?php echo number_format($sales->totalPrice, 0, ',', '.'); ?>,-</b>

           <input name="idSales" type="hidden" value="<?php echo $sales->idSales; ?>" required><br><br>
            <input name="confirmationName" type="hidden" value="<?php echo $customer->customerName; ?>" required>
             <input name="confirmationEmail" type="hidden" value="<?php echo $customer->customerEmail; ?>" required>
           Pemilik Rekening<br>
           <input name="pemilikRek" type="text" class="subs-input" required><br><br>
           Bank<br>
         <input name="yourBank" type="text" class="subs-input" required><br><br>
          Jumlah yang Dibayar<br>

           Rp <input name="totalPayment" type="text" class="subs-input" required><br><br>

           Tanggal Transaksi<br>
          
      <input name="paymentDate" id="datepicker" type="text" class="subs-input" required><br><br>
         
                Transfer ke Rekening<br>
                    <select name="toBank"  class="subs-input" style="width: 300px;" required>

                      <option value="1670001511962">Mandiri 1670001511962 a/n Taufik Ismail</option>
                  
                    </select><br><br>

                    <input type="submit" value="Confirm Payment" class="removecart"/>
                  </form>

                    <?php
                }else{
                 
  $rowsPerPage = 15;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
  $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

  $sales = new sales();
  $salesProduct = new salesproduct();
  $sales->idCustomer = $customer->idCustomer;
  $salesView = $sales->setVarSalesCus($offset, $rowsPerPage);

  $customer = new customer();

    if (count($salesView) == 0) {
      echo "<p align=left>No order need confirmation.</p>";
   }else{

       ?>
   
                <table cellpadding="13"style=" border-collapse: collapse; color: #372f2d;">
        
          <tr bgcolor="#372f2d" style="color: #f7be2f; ">
          <td width="30"><p align="center"><strong>No</strong></p></td>
          <td width="100"><p align="left"><strong>Order Id</strong></p></td>
          <td width="200"><p align="left"><strong>Checkout Date</strong></p></td>
          <td width="100"><p align="center"><strong>Product</strong></p></td>
          <td width="130"><p align="center"><strong>Total</strong></p></td>
          <td width="130"><p align="center"><strong>Payment State</strong></p></td>
          <td width="280"><p align="center"><strong>Action</strong></p></td>
          </tr>
<?php
   
    for($i = 0; $i < count($salesView); $i++){
      
      if($i % 2 == 1){ echo "<tr bgcolor=\"#efefef\"  style=\"color: #3a3a3a;\">";} 
      else {
       echo "<tr bgcolor=\"#fff\"  style=\"color: #3a3a3a;\">";
      }
      
    

    $customer->idCustomer = $salesView[$i]->idCustomer;
    $customer->setVar();
    $salesProduct->idSales = $salesView[$i]->idSales;
    ?>
    <td width="30"><p align="center"><?php echo $i+1; ?></p></td>
    <td width="100"><p align="left"><?php echo str_pad( $salesView[$i]->idSales, 5, '0',STR_PAD_LEFT);  ?></p></td>
    <td width="200"><p align="left"><?php echo $salesView[$i]->salesDate; ?></p></td>
    <td width="100"><p align="center"><?php echo $salesProduct->cekRowPerSales(); ?> Product(s)</p></td>
    <td width="130"><p align="center">Rp <?php echo number_format($salesView[$i]->totalPrice, 0, ',', '.'); ?>,-</p></td>
    <td width="130"><p align="center"><?php echo $salesView[$i]->confirmationState; ?></p></td>
    <td width="280"><p align="right"><a class="removecart" target="_blank" href="invoice.php?orderid=<?php echo $salesView[$i]->idSales; ?>">Order Detail</a> <a class="removecart" href="confirmation.php?confirm=yes&orderid=<?php echo $salesView[$i]->idSales; ?>">Confirm Payment</a></p></td>
    </tr>

    <?php

    }

?>
        </table>
<div class="page-num-con" style="text-align: left;">
<?php
    echo $sales->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
          </div>

                    <?php
                }
                

              }
            ?>
             
             
      </div>
    </div>
     </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=AccountSetting"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=AccountSetting"><!--
//--></script>
<?php
    include "footer.php";
 ?>