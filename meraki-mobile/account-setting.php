<?php
    include "../modul/mainFunction.php";
    connect();
      global $current;
    $current ='ACCOUNT';
    include "header.php";
    

  
?>
      <div class="mobile-content">
              <form name="changePicture" action='change-picture.php' method="post" enctype='multipart/form-data'>
                     <p><b>CHANGE PICTURE</b></p>
                    
                             <p><img src="crop.php?h=150&w=150&f=../<?php echo $customer->viewImage();?>"/></p>
                             <p><input name='picture' type='file' /><br>(format: jpg/jpeg/png, size: <2MB) </p>
                             <p align=left><input name='input' type='submit' class="contact-submit" value='UPDATE PICTURE' /></p>
                         
                 </form><br /><br>

    <?php
  $city = new city();
  $city->idCity = $customer->customerCity;
    $city->setVar();
  ?>
                 <form name="changeName" action='update-information.php' method="post" >
                        <p><b>ACCOUNT INFORMATION</b></p>
                            <p align=left>NAME</p>
                            <p> <input class="contact-input" type=text name='customerName' size=25 value="<?php echo $customer->customerName;?>" required></p><br>
                            <p align=left>EMAIL</p>
                            <p> <?php echo $customer->customerEmail;?></p><br>
                            <p align=left>PHONE</p>
                            <p> <input class="contact-input" type=text name='customerPhone' size=25 value="<?php echo $customer->customerPhone;?>" required></p><br>
                            
                            <p align=left>ADDRESS</p>
                            <p> <textarea class="contact-textarea" name="customerAddress" cols="40" rows="5"><?php echo $customer->customerAddress;?></textarea></p><br>
                             <p align=left>CITY</p>
                             <p> 
                                <select name="customerCity" class="contact-input">
                                    <option value="<?php echo $customer->customerCity; ?>"><?php echo $city->cityName; ?> (selected)</option>

<?php
$cityArray = $city->viewCity();
  for($i = 0; $i < count($cityArray); $i++){
?>
                      <option value="<?php echo $cityArray[$i]->idCity; ?>"><?php echo $cityArray[$i]->cityName; ?></option>
                      <?php
                    }
                      ?>
                                </select>


                             </p>
                           
                            <p align=left><input type="submit" value="UPDATE INFORMATION" class="contact-submit"/></p>
                            
                </form><br /><br>
                <form name="changePass" action='change-pass.php' method="post" onSubmit="return validateChangePass();">
                            <p><b>CHANGE PASSWORD</b></p>
                                <p align=left>New Password</p>
                                <p> <input class="contact-input" type=password name='new1' size=25 required></p><br>
                                <p align=left>Retype New Password</p>
                                <p> <input class="contact-input" type=password name='new2' size=25 required></p><br>
                                <p align=left>Old Password</p>
                                <p> <input class="contact-input" type=password name='old' size=25 required></p>
                                <p align=left><input type="submit" value="UPDATE PASSWORD" class="contact-submit"/></p>
                                
               </form><br>
         
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=AccountSetting"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=AccountSetting"><!--
//--></script>
<?php
    include "footer.php";
 ?>