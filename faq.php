<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='FAQ';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/artistModule.php';
  
?>
       <div class="content">
        <div class="mid-content">
             <?php
                        $contact = new setting();
                         $contact->idSetting = 'faqTitle';
                         $contact->selectSetting();
                    ?>
             <div class="title-faq">
                    <a href="##"><?php echo $contact->settingDescription; ?></a>
                </div>
            <div class="mid-content-box">
                <div class="faq-content">
                <?php
                $contact->idSetting = 'faqText';
                         $contact->selectSetting();
                         echo $contact->settingDescription;
                    ?>
                </div>
            </div>
            <div class="mid-content-box">
                <div class="social">
                    <?php
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
                         $contact->idSetting = 'contactT';
                         $contact->selectSetting();
                    ?>
                    <a href="<?php echo $contact->settingDescription; ?>"><img src="images/t.png" /></a>
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
                <form action="send-message.php" name="contact" enctype='multipart/form-data' method="post" onsubmit="return validateContactMessage();">
                    <div class="message-data">
                        <input name="nama" type="text"  class="contact-input" onFocus="HideYourname(this)" onBlur="ShowYourname(this)" value="YOUR NAME" required>
                        <input name="email" type="text"  class="contact-input" onFocus="HideYouremail(this)" onBlur="ShowYouremail(this)" value="YOUR EMAIL" required>
                        <input name="phone" type="text"  class="contact-input" onFocus="HideYourphone(this)" onBlur="ShowYourphone(this)" value="YOUR PHONE NUMBER" required>
                    </div>
                    <div class="message-text">
                        <textarea name="message" class="contact-textarea" onFocus="HideYourmessage(this)" onBlur="ShowYourmessage(this)">YOUR MESSAGE</textarea>
                        <input type="submit" value="SEND MESSAGE" class="contact-submit"/>
                    </div>
                </form>
            </div>
        </div>
        </div>
                
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Home"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Home"><!--
//--></script>
        <?php
    include 'footer.php';
?>