<html>
    <head>
        <?php
         if($articlepage){
        ?>
         <title>Meraki <?php echo ":: ".$news->newsTitle; ?></title>
         <meta name="keyword" content="<?php echo $news->newsMetaKeyword; ?>" />
        <meta name="description" content="<?php echo $news->newsMetaDescription; ?>" />
        <?php
         }else{
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
        <?php
         }
        ?>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
        <link href="images/favicon.png" rel="shortcut icon" type="image.png"/>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="style.php" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="fungsi.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
       
        <script src="jquery.touchSwipe.min.js"></script>
        <script>
    $(function() {      
      //Enable swiping...
      $("#menu").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
          hideMenu('menu');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold:0
      });   
      //Enable swiping...
      $("#login").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
          hideMenu('menu');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold:0
      });     
      //Enable swiping...
      $("#nav").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount) {
          hideMenu('menu');
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        threshold:0
      });

      //$("#wrapper").swipe( {
        //Generic swipe handler for all directions
        //swipeRight:function(event, direction, distance, duration, fingerCount) {
          //showMenu('menu');
        //},
        //Default is 75px, set to 0 for demo so any distance triggers swipe
        //threshold:0
      //});
        
    });
      
     </script>
    </head>
    <body>
       <div class="navigation-con" id="menu">
                    <div class="login-information" id="login">
                      <a>Hello, <img src="images/close-button.png" ontouchstart="hideMenu('menu');"  onclick="hideMenu('menu');" style="float:right; width: 7vw; padding-right:5vw;"/></a>

                <?php

                        if($_SESSION['customer_signed_in']==true){
                             include "../modul/customerModule.php";
                             $customer = new customer();
                             $customer->idCustomer = $_SESSION['idCustomer'];
                             $customer->setVar();
                ?>
                            
                            <a href="account-setting.php"><?php echo $_SESSION['customerName']; ?>!</a>
                              <a href="signout.php" >LOG OUT</a>
                            
                <?php
                        }else{
                            ?>
                            <a href="signin.php" >LOGIN</a>
                             <a href="signup.php">REGISTER</a>

                             
                            <?php

                        }
                ?>
                       
                    </div>
                    <div class="navigation" id="nav">
                       <?php
                            $arrayMenu = array("HOME","DAILY","THE ARTIST","PRODUCTS","CONTEST","CATCH US","FAQ");
                            $arrayMenuUrl = array("Home","daily/all/","artist/all/","shop/all/","contest/all/","catchus","faq");
                            for($i = 0; $i < count($arrayMenu); $i++){
                                    echo "<a href=\"".$arrayMenuUrl[$i]."\">".$arrayMenu[$i]."</a>";
                                
                            }
                    ?>
                </div>
            </div>
          
            <div class="top-search" id="search">
               <form action="search-result" method="post" enctype='multipart/form-data'>
                            <input name="search" type="text" id="search" class="search-input-mobile" onFocus="HideLabel(this)" onBlur="ShowLabel(this)" value="Find artists, products, and more" required>

                            <img src="images/close-button.png" ontouchstart="hideSearch('search');"  onclick="hideSearch('search');" style="float:right; width: 8%; margin-top: 5px;margin-left: 2%;"/>
                            <input type="submit" value="" class="search-submit-mobile" />
                        </form>
        </div>
          <div class="header">
          <img src="images/menu-button.png"  class="menu" ontouchstart="showMenu('menu');"  onclick="showMenu('menu');" />

          <img src="images/search-button.png"  class="search" ontouchstart="showSearch('search');"  onclick="showSearch('search');"/>
          <?php

                      $isicart = 0;

                       include_once '../modul/salesModule.php';
                      if(isset($_SESSION["cart_item"])){
                         
                           $salesproduct = new salesproduct();
                          $salesproduct->idSales = $_SESSION["cart_item"];
                          $isicart = $salesproduct->cekRowPerSales();
                      }
   
                    
          ?>
          <div class="cart"  onclick="location.href='shop/cart/';" ontouchstart="location.href='shop/cart/';">
              <span><?php echo  $isicart; ?></span>
          </div>
          <p class="current"><?php echo $current; ?></p>

        </div>
           
       
    <div class="wrapper">
        <!--<div class="top-bg">
        </div>-->
       
      