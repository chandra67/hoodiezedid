<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='FAQ';
    include 'header.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/artistModule.php';
  
?>
       <div class="mobile-content">
             <?php
                        $contact = new setting();
                       
                $contact->idSetting = 'faqText';
                         $contact->selectSetting();
                         echo $contact->settingDescription;
                    ?>
        </div>
          
        
                
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>