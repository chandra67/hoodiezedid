<?php
    include "modul/mainFunction.php";
    connect();
    include "header.php";
    
    include "modul/salesModule.php";
     require_once('modul/PHPMailer/class.phpmailer.php');

   
?>
    <div class="content">
            <div class="mid-content">
              <div class="title">
                    <a href="##">PAYMENT CONFIRMATION</a>
                </div>
                <div class="mid-content-box">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $confirmation = new confirmation();
        $confirmation->confirmationName = $_POST['confirmationName'];
        $confirmation->confirmationEmail = $_POST['confirmationEmail'];
        $confirmation->idSales = $_POST['idSales'];
        $confirmation->pemilikRek = $_POST['pemilikRek'];
        $confirmation->totalPayment = $_POST['totalPayment'];
        $confirmation->paymentDate = $_POST['paymentDate'];
        $confirmation->yourBank = $_POST['yourBank'];
        $confirmation->toBank = $_POST['toBank'];
        $confirmation->confirmationNote = $_POST['confirmationNote'];

         $mail             = new PHPMailer(); // defaults to using php "mail()"

         $pesan = "<!DOCTYPE html>
                   <html>
                       <head>
                           <title>Meraki Receipt Notification</title>
                           <meta charset=\"UTF-8\">
                           <meta name=\"viewport\" content=\"width=device-width\"> </head>
                       <body>
                           <p align=\"center\"><img src=\"images/meraki.png\" width=\"300\"/></p>
                           <br>
                           <p align=\"center\"><b>CONFIRMATION DETAIL<b></p>
                           <p align=\"center\">Name : ".$confirmation->confirmationName."</p>
                            <p align=\"center\">Email : ".$confirmation->confirmationEmail."</p>
                             <p align=\"center\">Order Id : ".$confirmation->idSales."</p>
                              <p align=\"center\">Bank Account Holder : ".$confirmation->pemilikRek."</p>
                               <p align=\"center\">Total Payment : Rp ".$confirmation->totalPayment.",-</p>
                                <p align=\"center\">Customer Bank : ".$confirmation->yourBank."</p>
                                 <p align=\"center\">Meraki's Bank : ".$confirmation->toBank."</p>
                                 <p align=\"center\">Confirmation Note : ".$confirmation->confirmationNote."</p>
                         

                          
                       </body>
                   </html>";

               $body             = eregi_replace("[\]",'',$pesan);

               
                $nama = "Meraki Notification";
                $email = "info@meraki.co.id";
               $mail->AddReplyTo($email,$nama);

               $mail->SetFrom($email, $nama);

               $mail->AddReplyTo($email,$nama);
               
                $address = "meraki.indo@gmail.com";
                $mail->AddAddress($address , $nama);

             

               $mail->Subject    = "Meraki: Payment Confirmation Notification";

               $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

               $mail->MsgHTML($body);
               //////

        
        if($confirmation->insertConfirmation()){
          echo "<p>Confirmation complete!</p>";
          $mail->Send();
        }else{
          echo "<p>Error, confirmation failed.</p>";
        }
                
    }else{
?>
        <form action="" method="post" name="confirm" >
           NAME*<br>
           <input name="confirmationName" type="text" class="subs-input" value="<?php echo $customerEmail; ?>"><br><br>
           EMAIL*<br>
           <input name="confirmationEmail" type="text" class="subs-input"><br><br>
           ORDER ID*<small>(check your email)</small><br>
           <input name="idSales" type="text" class="subs-input"><br><br>
           BANK ACCOUNT HOLDER*<br>
           <input name="pemilikRek" type="text" class="subs-input" required><br><br>
           YOUR BANK*<br>
           <input name="yourBank" type="text" class="subs-input" required><br><br>
           TRANSFER TO BANK*<br>
           <input name="toBank" type="text" class="subs-input" required><br><br>
           TOTAL PAYMENT*<br>
           <input name="totalPayment" type="text" class="subs-input" required><br><br>
           PAYMENT DATE*<br>
           <input name="paymentDate" type="text" id="datepicker" class="subs-input" required><br><br>
           CONFIRMATION NOTE<br>
          <textarea name="confirmationNote" type="text" class="textarea-input" cols="10"  ></textarea><br><br>
         
           <p><input type="submit" value="CONFIRM PAYMENT" class="register-login"/></p>
            <small>*Required</small>
            </form>
<?php
    }
?>        </div>
      </div>
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=SignUp"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=SignUp"><!--
//--></script>
<?php
    include "footer.php";
 ?>