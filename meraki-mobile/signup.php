<?php
    include "../modul/mainFunction.php";
    connect();
     global $current;
    $current ='REGISTER';
    include "header.php";
    
    include "../modul/customerModule.php";

    if(isset($_GET['customerEmail']))
    {
      $customerEmail = $_GET['customerEmail'];
    }
?>
    <div class="mobile-content">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $customer = new customer();
        $customer->customerEmail = $_POST['customerEmail'];
        $customer->customerPassword = $_POST['customerPassword'];
        $customer->customerName = $_POST['customerName'];
        $customer->customerPhone = $_POST['customerPhone'];
        $customer->customerAddress = $_POST['customerAddress'];
        $customer->customerCity = $_POST['customerCity'];
        $customer->customerImage = "#";
        
        if($customer->cekEmail()){
?>
        <p style="color:#FFF;"><b>Email is already in use!</b></p>
        <form action="" method="post" name="SignUp2" onSubmit="return validateSignUpForm2();">
                    EMAIL*<br>
                        <input name="customerEmail" type="text" class="contact-input"><br><br>
                    PASSWORD*<br>
                        <input name="customerPassword" type="password" class="contact-input"><br><br>
                    CONFIRM PASSWORD*<br>
                    <input name="customerPassword2" type="password" class="contact-input"><br><br>
                    NAME*<br>
                    <input name="customerName" type="text" class="contact-input" required><br><br>
                    PHONE*<br>
                    <input name="customerPhone" type="text" class="contact-input" required><br><br>
                    ADDRESS*<br>
<?php
                 if(isset($_POST['link']))
                {
                    $link = $_POST['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                    <textarea name="customerAddress" type="text" class="contact-textarea" cols="10"  required="required"></textarea><br><br>
                     
                     CITY*<br>
                    <select name="customerCity"  class="contact-input" required>
<?php
  $city = new city();
  $cityArray = $city->viewCity();
  for($i = 0; $i < count($cityArray); $i++){
?>
                      <option value="<?php echo $cityArray[$i]->idCity; ?>"><?php echo $cityArray[$i]->cityName; ?></option>
                      <?php
                    }
                      ?>
                    </select>
                      <br><br>
                   
                    <p><input type="submit" value="REGISTER" class="contact-submit"/></p>
                    
            <small>*Required</small>
            </form>
    <?php
        }else{
          $link = "signin.php?reg=true";
            if(isset($_POST['link']))
            {
                $link = $_POST['link'];
            }
            $customer->registerUserMobile($link);
        }
                
    }else{
?>
        <form action="" method="post" name="SignUp2" onSubmit="return validateSignUpForm2();">
           EMAIL*<br>
           <input name="customerEmail" type="text" class="contact-input" value="<?php echo $customerEmail; ?>"><br><br>
           PASSWORD*<br>
           <input name="customerPassword" type="password" class="contact-input"><br><br>
           CONFIRM PASSWORD*<br>
           <input name="customerPassword2" type="password" class="contact-input"><br><br>
           NAME*<br>
           <input name="customerName" type="text" class="contact-input" required><br><br>
           PHONE*<br>
           <input name="customerPhone" type="text" class="contact-input" required><br><br>
           ADDRESS*<br>
          <textarea name="customerAddress" type="text" class="contact-textarea" cols="10"  required="required"></textarea><br><br>
          <?php
                 if(isset($_GET['link']))
                {
                    $link = $_GET['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                CITY*<br>
                    <select name="customerCity"  class="contact-input" required>
<?php
  $city = new city();
  $cityArray = $city->viewCity();
  for($i = 0; $i < count($cityArray); $i++){
?>
                      <option value="<?php echo $cityArray[$i]->idCity; ?>"><?php echo $cityArray[$i]->cityName; ?></option>
                      <?php
                    }
                      ?>
                    </select>
                      <br><br>
           <p><input type="submit" value="REGISTER" class="contact-submit"/></p>
            <small>*Required</small>
            </form>
<?php
    }
?>        
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=SignUp"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=SignUp"><!--
//--></script>
<?php
    include "footer.php";
 ?>