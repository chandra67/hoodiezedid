<?php
    include "modul/mainFunction.php";
    connect();
     global $current;
    $current ='Register';
    include "header.php";
    
    include "modul/customerModule.php";

    if(isset($_GET['customerEmail']))
    {
      $customerEmail = $_GET['customerEmail'];
    }
?>
 <div class="menu" style="padding-top: 40px;text-align: left;">
                <a href="##" class="current">Register</a>
               
          </div>
    <div class="content" style="padding-top: 0px;">
            <div class="mid-content">
                <div class="mid-content-box">
                 <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p><br>
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
        <p align="left" style="color:#FFF;"><b>Email is already in use!</b></p>
        <form action="" method="post" name="SignUp2" onSubmit="return validateSignUpForm2();">
                  <p align="left">  EMAIL*<br>
                        <input name="customerEmail" type="text" class="subs-input"><br><br>
                    PASSWORD*<br>
                        <input name="customerPassword" type="password" class="subs-input"><br><br>
                    CONFIRM PASSWORD*<br>
                    <input name="customerPassword2" type="password" class="subs-input"><br><br>
                    NAME*<br>
                    <input name="customerName" type="text" class="subs-input" required><br><br>
                    PHONE*<br>
                    <input name="customerPhone" type="text" class="subs-input" required><br><br>
                    ADDRESS*<br>
<?php
                 if(isset($_POST['link']))
                {
                    $link = $_POST['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                    <textarea name="customerAddress" type="text" class="textarea-input" cols="10"  required="required"></textarea><br><br>
                     CITY*<br>
                      <select name="customerCity"  class="subs-input" required>
<?php
  $city = new city();
  $cityArray = $city->viewCity();
  for($i = 0; $i < count($cityArray); $i++){
?>
                      <option value="<?php echo $cityArray[$i]->idCity; ?>"><?php echo $cityArray[$i]->cityName; ?></option>
                      <?php
                    }
                      ?>
                    </select><br><br>
                    <input type="submit" value="Register" class="register-login"/><br>
                    
            <small>*Required</small></p>
            </form>
    <?php
        }else{
          $link = "signin.php?reg=true";
            if(isset($_POST['link']))
            {
                $link = $_POST['link'];
            }
            $customer->registerUser($link);
        }
                
    }else{
?>
        <form action="" method="post" name="SignUp2" onSubmit="return validateSignUpForm2();">
         <p align="left">  EMAIL*<br>
           <input name="customerEmail" type="text" class="subs-input" value="<?php echo $customerEmail; ?>"><br><br>
           PASSWORD*<br>
           <input name="customerPassword" type="password" class="subs-input"><br><br>
           CONFIRM PASSWORD*<br>
           <input name="customerPassword2" type="password" class="subs-input"><br><br>
           NAME*<br>
           <input name="customerName" type="text" class="subs-input" required><br><br>
           PHONE*<br>
           <input name="customerPhone" type="text" class="subs-input" required><br><br>
           ADDRESS*<br>
          <textarea name="customerAddress" type="text" class="textarea-input" cols="10"  required="required"></textarea>
          <br><small>note: harap tulis lengkap dengan kecamatan dan kelurahan</small>
          <br><br>
          <?php
                 if(isset($_GET['link']))
                {
                    $link = $_GET['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                CITY*<br>
                    <select name="customerCity"  class="subs-input" required>
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
           <input type="submit" value="Register" class="register-login"/><br>
            <small>*Required</small></p>
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