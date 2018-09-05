<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='Contact';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/artistModule.php';
  
?>
<div class="menu" style="padding-top: 40px; ">
                    <p align="left"><a href="##" class="current">Contact Us</a></p>
                </div>
       <div class="content">
        <div class="mid-content">
             
              
            <div class="mid-content-box" style="padding-top: 0;">
                <p>Do you have any question, comments or suggestion for Hoodiezed?<br>
You can submit it through the columns below </p><br>
               
                <form action="send-message.php" name="contact" enctype='multipart/form-data' method="post" >
                  
                        <input name="nama" type="text"  class="subs-input" placeholder="Your Name" required><br>
                        <input name="email" type="email"  class="subs-input" placeholder="Your Email" required><br>
                        <input name="phone" type="number"  class="subs-input" placeholder="Your Phone Number" required><br>
                 
                        <textarea name="message" class="textarea-input" placeholder="Your Message" style="margin-top: 10px;" required></textarea><br>
                        <input type="submit" value="Send Message" class="contact-submit" style="margin-top: 10px;"/>
                   
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