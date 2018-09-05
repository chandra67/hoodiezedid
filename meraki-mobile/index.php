<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='HOME';
    include 'header-home.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/artistModule.php';
  
?>
        <div class="mobile-content">
            <p style="text-align:center;"><img src="images/meraki.png" width="50%" /></p>
        </div>
</div>
<?php
    $image = new image();
    $image->imageHeaderId = "0";
    $image->imageType = "mobile-slide";
    $rowsPerPage = 14;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
      $pageNum = $_GET['page'];
    }
    $sort = "DESC";
    $offset = ($pageNum - 1) * $rowsPerPage;
    $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);

    $contest = new setting();
    $contest->idSetting = 'contestPageTopBanner';
    $contest->selectSetting();
                 
                   
  
    for($i = 0; $i < 2; $i++){    
        ?>
        <a href="<?php echo $imageView[$i]->imageDescription; ?>"><img src="http://meraki.co.id/uploaded_images/mobile-slide/<?php echo $imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>"  style="width: 100%;"/></a>
    <?php
    }


?>
            <a href="contest/all/"><img src="http://meraki.co.id/uploaded_images/setting/<?php echo $contest->idSetting; ?>/<?php echo $contest->settingDescription; ?>"  style="width: 100%;"/></a>
<?php
 for($i = 2; $i < count( $imageView); $i++){    
        ?>
            <a href="<?php echo $imageView[$i]->imageDescription; ?>"><img src="http://meraki.co.id/uploaded_images/mobile-slide/<?php echo $imageView[$i]->imageHeaderId."/".$imageView[$i]->imageUrl; ?>"  style="width: 100%;"/></a>
<?php
    }

  ?>
<div class="wrapper">
        <div class="mobile-content">
            <div style="text-align:center; color: #888; padding-top: 10px; font-size: 3.5vw;">
                    <?php
                        $welcome = new setting();
                       
                         $welcome->idSetting = 'welcomeMessage';
                         $welcome->selectSetting();
                    ?>
                    <?php echo $welcome->settingDescription; ?>
            </div>
            
        </div>
        <div class="mobile-content">
             <div class="social">
                    <?php
                        $contact = new setting();
                         $contact->idSetting = 'contactFacebook';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/fb.png" /></a>
                     <?php
                         $contact->idSetting = 'contactInstagram';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/instagram.png" /></a>
                     <?php
                         $contact->idSetting = 'contactTwitter';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/tw.png" /></a>
                    
                     <?php
                         $contact->idSetting = 'contactPath';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/path.png" /></a>
                     <?php
                         $contact->idSetting = 'contactYoutube';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/youtube.png" /></a>
                </div>
        </div>

      
                
        <?php
    include 'footer.php';
?>