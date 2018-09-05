<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='CATCH US';
    include 'header.php';
    include '../modul/productModule.php';
    include '../modul/imageModule.php';
    include '../modul/artistModule.php';
  
?>
            <div class="mobile-content">
                <div class="contact-text-top">
                <?php
                        $contact = new setting();
                         $contact->idSetting = 'contactText';
                         $contact->selectSetting();

                         echo $contact->settingDescription;
                    ?>
                </div>
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
                <form action="send-message.php" name="contact" enctype='multipart/form-data' method="post" onsubmit="return validateContactMessage();" style="text-align: center; padding-top:100px;">
                    
                        <input name="nama" type="text"  class="contact-input" onFocus="HideYourname(this)" onBlur="ShowYourname(this)" value="YOUR NAME" required>
                        <input name="email" type="text"  class="contact-input" onFocus="HideYouremail(this)" onBlur="ShowYouremail(this)" value="YOUR EMAIL" required>
                        <input name="phone" type="text"  class="contact-input" onFocus="HideYourphone(this)" onBlur="ShowYourphone(this)" value="YOUR PHONE NUMBER" required>
                   
                    
                        <textarea name="message" class="contact-textarea" onFocus="HideYourmessage(this)" onBlur="ShowYourmessage(this)">YOUR MESSAGE</textarea>
                        <input type="submit" value="SEND MESSAGE" class="contact-submit"/>
                    
                </form>
                <form action="signup.php" method="get" style="padding-top: 50px; padding-bottom: 30px; width: 100%; overflow:auto; height:auto;">
                     <input name="customerEmail" type="text" id="search" class="subs-input" onFocus="HideLabel2(this)" onBlur="ShowLabel2(this)" value="YOUR EMAIL HERE" required>
                     <input type="submit" value="SUBSCRIBE" class="subs-button"/>
                 </form>
            </div>
       
                
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>