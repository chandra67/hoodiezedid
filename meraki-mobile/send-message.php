<?php
//send notif
        require_once('../modul/PHPMailer/class.phpmailer.php');
        
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $description = $_POST['message'];
        $phone = $_POST['phone'];
        
        

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
                           <p align=\"center\"><b>CONTACT MESSAGE<b></p>
                           <p align=\"center\">Name : ". $nama."</p>
                            <p align=\"center\">Email : ".$email."</p>
                             <p align=\"center\">Phone : ".$phone."</p>
                              <p align=\"center\">Messages : ".$description."</p>
                         

                          
                       </body>
                   </html>";

               $body             = eregi_replace("[\]",'',$pesan);

               
               $mail->AddReplyTo($email,$nama);

               $mail->SetFrom($email, $nama);

               $mail->AddReplyTo($email,$nama);
               
                $address = "meraki.indo@gmail.com";
                $mail->AddAddress($address , $nama);

             

               $mail->Subject    = "Meraki: Contact Message Notification";

               $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

               $mail->MsgHTML($body);
               //////

        
    if($mail->Send()){
        echo "<script>alert(\"Message Sent! Thank you!\");document.location = 'Home';</script>";
    }else{
        echo "<script>alert(\"Failed to send message! Please try again later!\");document.location = 'Home';</script>";
    }