<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
    include "../modul/customerModule.php";
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Customer';
    include "header.php";
    
    if(isset($_GET['tab'])){
		$tab = $_GET['tab'];
	}
?>
<div class="content">
    <div class="tab-menu-con">
        <div class="tab-menu" id="customer" onClick="aktifTabCustomer('customer');showKontenCustomer('customer-konten');">Customer</div>
        <div class="tab-menu" id="newsletter" onClick="aktifTabCustomer('newsletter');showKontenCustomer('newsletter-konten');">Newsletter</div>
        <div class="tab-menu-bot"></div>
    </div>
     <div class="tab-konten-con">
        <div class="tab-konten" id="customer-konten">
            <?php
                if(isset($_GET['edit']) and $tab == 'customer'){
                   include "customer/edit-customer.php";
                }else{
                     include "customer/customer-view.php";
                }
            ?>
        </div>
        <div class="tab-konten" id="newsletter-konten">
            <?php
                         include "customer/newsletter.php";      
            ?>
        </div>
        <div class="tab-menu-bot"></div>
    </div>
	<?php
          cekTabCustomer($tab);
    ?>
</div>
<?php
	include "footer.php";
?>