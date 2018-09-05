<?php
    include "modul/mainFunction.php";
    connect();
    include "header.php";
    

  
?>
 <div class="menu" style="padding-top: 40px;text-align: left;">
              <a href="##" class="current">Your Account</a>
               <a href="change-pass-view.php">Change Password</a>
                <a href="confirmation.php">Confirmation</a>
                <a href="history.php">History</a>
          </div>
    <div class="content">

      <div class="mid-content">
         
          <div class="mid-content-box" style="text-align: left;">

           
              <form name="changePicture" action='change-picture.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3" >
                         <tr>
                             <td width="160"><img src="crop.php?h=150&w=150&f=<?php echo $customer->viewImage();?>"/></td>
                             <td width="390"><input name='picture' type='file' class="subs-input"/><br><small>(format: jpg/jpeg/png, size: <2MB)</small> </p><br><p align=left><input name='input' type='submit' class="small-button" value='UPDATE PICTURE' /></p></td>
                         </tr>
                     </table>
                     
                 </form><br /><br>
 <?php
   
  $city = new city();
  $city->idCity = $customer->customerCity;
    $city->setVar();
  ?>
                 <form name="changeName" action='update-information.php' method="post" >
                       
                            <table cellpadding=5 >
                            <tr><td width="160"><p align=left>Name</p></td><td> <input class="subs-input" type=text name='customerName' size=25 value="<?php echo $customer->customerName;?>" required></td></tr>
                            <tr><td ><p align=left>Email</p></td><td> <?php echo $customer->customerEmail;?></td></tr>
                            <tr><td ><p align=left>Phone</p></td><td> <input class="subs-input" type=text name='customerPhone' size=25 value="<?php echo $customer->customerPhone;?>" required></td></tr>
                            
                            <tr><td ><p align=left>Address</p></td><td> <textarea class="textarea-input" name="customerAddress" cols="40" rows="5"><?php echo $customer->customerAddress;?></textarea></td></tr>
                             <tr><td ><p align=left>City</p></td><td> 
                                <select name="customerCity" class="subs-input">
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


                             </td></tr>
                           
                            <tr><td></td><td><p align=left><input type="submit" value="UPDATE INFORMATION" class="small-button"/></p></td></tr>
                            </table>
                </form><br /><br>
              
          </div>
      </div>
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=AccountSetting"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=AccountSetting"><!--
//--></script>
<?php
    include "footer.php";
 ?>