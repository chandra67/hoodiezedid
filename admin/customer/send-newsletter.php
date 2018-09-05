<?php
//send notif
         include "../../modul/mainFunction.php";
        connect();
        cekLoginAdmin();
        require_once('../../modul/PHPMailer/class.phpmailer.php');
        include "../../modul/customerModule.php";

        
        $nama = "Meraki.co.id";
        $subject = $_POST['subject'];
        $description = $_POST['message'];

        if ( isset( $_FILES['picture'] ) ) {
            if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
                $source = $_FILES['picture']['tmp_name'];
                                        $filename = $_FILES['picture']['name'];
                $target = "../../uploaded_images/newsletter/".$filename;
                
                $move = move_uploaded_file( $source, $target );
                if (!$move) { 
                  echo "<script>alert(\"error move\");</script>";
                }
            }else{
                echo "<script>alert(\"error format\");</script>";
            }
      }else{
                          echo "<script>alert(\"error no file\");</script>";
      }
        

         $mail             = new PHPMailer(); // defaults to using php "mail()"

         $pesan = "<!DOCTYPE html>
                   <html>
                       <head>
                           <title>Meraki Newsletter</title>
                           <meta charset=\"UTF-8\">
                           <meta name=\"viewport\" content=\"width=device-width\"> </head>
                       <body>
                           <p align=\"center\"><img src=\"../../uploaded_images/newsletter/".$filename."\" /></p>
                           <br>
                           <div style=\"text-align: center;\">
                           ".$description."
                           </div>
                       </body>
                   </html>";

               $body             = eregi_replace("[\]",'',$pesan);

               $email = "info@meraki.co.id";
               $mail->AddReplyTo($email,$nama);

               $mail->SetFrom($email, $nama);

               $mail->AddReplyTo($email,$nama);

                $mail->Subject    =  $subject;

               $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

               $mail->MsgHTML($body);
               //////
               
              
                $customer = new customer();
              $customerView = $customer->viewAllCustomer();
              $sent = 0;


             for($i = 0; $i < count($customerView); $i++){
                $customerName = $customerView[$i]->customerName;
                $address = $customerView[$i]->customerEmail;
                $mail->AddAddress($address , $customerName);
                
                 if($mail->Send()){
                       $sent+=1;
                  }
             }

             
echo "<script>alert(\"".$sent."/".count($customerView)." Newsletter Sent!\");document.location = '../customer.php?tab=newsletter';</script>";
              

        
   