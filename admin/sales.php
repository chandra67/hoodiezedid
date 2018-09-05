<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
    include "../modul/productModule.php";
    include "../modul/stockModule.php";
    include "../modul/imageModule.php";
    include "../modul/salesModule.php";
    include "../modul/siteSettingModule.php";
    include "../modul/customerModule.php";
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Sales';
    include "header.php";
    
    if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
	<div class="tab-menu-con">
        <div class="tab-menu" id="sales" onClick="aktifTabSales('sales');showKontenSales('sales-konten');">Sales</div>
        <div class="tab-menu" id="confirmation" onClick="aktifTabSales('confirmation');showKontenSales('confirmation-konten');">Confirmation</div>
        <div class="tab-menu" id="notification" onClick="aktifTabSales('notification');showKontenSales('notification-konten');">Email Notification</div>
        <div class="tab-menu" id="shipping" onClick="aktifTabSales('shipping');showKontenSales('shipping-konten');">Shipping Fee</div>
        <div class="tab-menu-bot"></div>
    </div>
     <div class="tab-konten-con">
        <div class="tab-konten" id="sales-konten">
            <?php
                if(isset($_GET['edit']) and $tab == 'sales'){
                    include "sales/edit-sales.php";
                }else{
                    include "sales/sales-view.php";
                }
            ?>
        </div>
        <div class="tab-konten" id="confirmation-konten">
            
            <?php
                if(isset($_GET['edit']) and $tab == 'confirmation'){
                    //echo "<p>n/a</p>";
                    include "sales/edit-confirmation.php";  
                }else{
                    include "sales/confirmation-view.php";  
                }
                        
            ?>
        </div>
         <div class="tab-konten" id="notification-konten">
            
            <?php
                    include "sales/edit-notification.php";      
            ?>
        </div>
         <div class="tab-konten" id="shipping-konten">
            <?php
                    include "sales/shipping-rate.php";      
            ?>
        </div>
        <div class="tab-menu-bot"></div>
    </div>
     <?php
          cekTabSales($tab);
    ?>
</div>
<?php
	include "footer.php";
?>