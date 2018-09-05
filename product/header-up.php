<html>
    <head>
        <?php
             include '../modul/siteSettingModule.php';
              $meta = new setting();
                $meta->idSetting = 'siteTitle';
                $meta->selectSetting();
         ?>
        <title><?php echo $meta->settingDescription; ?></title>
        <?php
                $meta->idSetting = 'siteKeyword';
                $meta->selectSetting();
        ?>
        <meta name="keyword" content="<?php echo $meta->settingDescription; ?>" />
         <?php
                $meta->idSetting = 'siteDescription';
                $meta->selectSetting();
        ?>
        <meta name="description" content="<?php echo $meta->settingDescription; ?>" />
       
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="../images/favicon.png" rel="shortcut icon" type="image.png"/>
         <link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
        <link href="../styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../fungsi.js"></script>
        <script type="text/javascript" src="../jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../jquery-2.1.4.min.js"></script>
      
               
    </head>
    <body>
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="wrapper">
        <!--<div class="top-bg">
        </div>-->
         <div class="header">
            <div class="navigation-con">
                <div class="navigation">
                    
               <?php
                    if($current == 'Home'){
                            echo "<div class=\"home-current\" onclick=\"location.href='../Home';\" ></div>";
                    }else{
                            echo "<div class=\"home\" onclick=\"location.href='../Home';\"></div>";
                    }

                    $arrayMenu = array("Shop","How To Order");
                    $arrayMenuUrl = array("../shop/all-category","../HowToOrder");
                    for($i = 0; $i < count($arrayMenu); $i++){
                        if($current == $arrayMenu[$i]){
                            echo "<a href=\"".$arrayMenuUrl[$i]."\" class=\"current\">".$arrayMenu[$i]."</a>";
                        }else{
                            echo "<a href=\"".$arrayMenuUrl[$i]."\">".$arrayMenu[$i]."</a>";
                        }
                    }
            ?>
                </div>
                <div class="logo">
                    <img src="../images/hoodiezed.png" height="50"/>
                </div>
                   <div class="navigation-right">
                       <?php

                      $isicart = 0;

                       include_once '../modul/salesModule.php';
    if(isset($_SESSION["cart_item"])){
       
         $salesproduct = new salesproduct();
        $salesproduct->idSales = $_SESSION["cart_item"];
        $isicart = $salesproduct->cekRowPerSales();
    }
   
                    
                        if($_SESSION['customer_signed_in']==true){
                             include "../modul/customerModule.php";
                             $customer = new customer();
                             $customer->idCustomer = $_SESSION['idCustomer'];
                             $customer->setVar();
                ?>
                           <a href="../cart/cart.php" class="cart"><b><?php echo  $isicart; ?></b></a>
                            <img src="../<?php echo $customer->viewImage(); ?>" class="customer-icon" height="40" />
                            <a onmouseover="showDropDown();" onmouseout="hideDropDown();" id="hover" href="##"><?php echo $_SESSION['customerName']; ?>!</a><a onclick="hideDropDown();" id="close" style="background-color: #372f2d; color: #f7be2f; visibility: hidden; position: fixed;" href="##"><?php echo $_SESSION['customerName']; ?></a>
                             
                <?php
                        }else{
                            ?>
                            <a href="../cart/cart.php" class="cart"><b><?php echo  $isicart; ?></b></a>
                             <a href="../signup.php">Register</a><a href="../signin.php" class="logout">Login</a>
                             
                            <?php

                        }
                ?>
            
                </div>
            </div>
        </div>
       <div class="header-sub-nav" onmouseover="showDropDown();" onmouseout="hideDropDown();" id="dropdown" >
              <div class="sub-button"  onclick="document.location = '../account-setting.php';">Account Detail</div>
              <div class="sub-button"  onclick="document.location = '../confirmation.php';">Confirmation</div>
              <div class="sub-button"  onclick="document.location = '../history.php';">Hystory</div>
              <div class="sub-button" onclick="document.location = '../signout.php';">Logout</div>
          </div>
