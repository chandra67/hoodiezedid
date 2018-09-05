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
        echo "<script>document.location = 'signin.php';</script>";
    }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $confirmation = new confirmation();
        $confirmation->idSales = $_POST['idSales'];
        $confirmation->confirmationName = $_POST['confirmationName'];
        $confirmation->confirmationEmail = $_POST['confirmationEmail'];
        $confirmation->confirmationNote = "no notes";
        $confirmation->pemilikRek = $_POST['pemilikRek'];
        $confirmation->yourBank = $_POST['yourBank'];
        $confirmation->toBank = $_POST['toBank'];
        $confirmation->paymentDate = $_POST['paymentDate'];

        if ($confirmation->insertConfirmation()) {
           $usales = new sales();
           $usales->idSales = $confirmation->idSales;
           $usales->confirmationState = 'confirmed';
           $usales->updateConfirmState();
            $result = "<p>Payment confirmation completed!. Thank You! We will inform when your product already on its way to you home :).  </p>";
        }else{
             $result = "<p>Payment confirmation failed!. Please try again later :(  </p>";
        }


      }

  
?>
 <div class="menu" style="padding-top: 40px;text-align: left;">
 <a href="account-setting.php" >Your Account</a>
               <a href="change-pass-view.php" >Change Password</a>
                <a href="confirmation.php" >Confirmation</a>
                <a href="history.php" class="current">History</a></div>
              
          
    <div class="content">

      <div class="mid-content">
         
          <div class="mid-content-box" style="text-align: center;">
             
             
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
  $sales->idCustomer = $customer->idCustomer;
  $salesView = $sales->setVarSalesHistory($offset, $rowsPerPage);

  $customer = new customer();
   
   if (count($salesView) == 0) {
      echo "<p align=left>No order history found.</p>";
   }else{

     echo $result;
    ?>

                <table cellpadding="10"style=" border-collapse: collapse; color: #372f2d;">
        
          <tr bgcolor="#372f2d" style="color: #f7be2f; ">
          <td width="30"><p align="center"><strong>No</strong></p></td>
          <td width="100"><p align="left"><strong>Order Id</strong></p></td>
          <td width="200"><p align="left"><strong>Checkout Date</strong></p></td>
          <td width="100"><p align="center"><strong>Product</strong></p></td>
          <td width="130"><p align="center"><strong>Total</strong></p></td>
          <td width="130"><p align="center"><strong>Payment State</strong></p></td>
          <td width="130"><p align="center"><strong>Shipping State</strong></p></td>
          <td width="130"><p align="center"><strong>Detail</strong></p></td>
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
    <td width="130"><p align="center"><?php echo $salesView[$i]->nextState; ?></p></td>
    <td width="130"><p align="center"><a class="removecart" target="_blank" href="invoice.php?orderid=<?php echo $salesView[$i]->idSales; ?>">Order Detail</a></p></td>
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