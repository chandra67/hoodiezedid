<?php
    include "../modul/mainFunction.php";
    connect();
     global $current;
    $current ='LOGIN';
    include "header.php";
    
     include "../modul/customerModule.php";
?>
   
   
      <div class="mobile-content">
        <img src="images/meraki.png" width="100%" /><br><br>
<?php
     if($_SESSION['customer_signed_in']==true)
    {
 ?>
        <p style=" padding: 10px;">You already logged in.</p>
 <?php
         if(isset($_GET['link']))
            {
                $link = $_GET['link'];
                echo "<script>document.location = 'user/order.php?order=".$link."';</script>";
            }

    }else {
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $customer = new customer();
        $customer->customerEmail = $_POST['email'];
        $customer->customerPassword = $_POST['password'];
        
        if(!$customer->signIn()){
?>
        <p>Email and Password didnt match!</p><br>
         <form action="signin.php" method="post" name="SignIn" onSubmit="return validateLoginForm();">
                
             
                <p><input name="email" type="text" class="login-input"  value="<?php echo $customer->customerEmail; ?>" required></p><br>
           
                 <?php
                 if(isset($_POST['link']))
                {
                    $link = $_POST['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                <p><input name="password" type="password"  class="login-input" required></p><br>
                <p><input type="submit" value="LOGIN" class="login-submit"></p>
                <br>
            </form>
<?php
        }else{
            if(isset($_POST['link']))
            {
                $link = $_POST['link'];
                echo "<script>document.location = '".$link."';</script>";
            }else{
                echo "<script>document.location = 'Home';</script>";
            }
            
        }
                
    }else{
        if($_GET['reg']){
?>
        <p style=" padding: 10px;"><b>Congratulations!</b> You are now registered.<br>
        Now you can login by fill up the form below</p>
 <?php
        }
  ?> 
        <form action="signin.php" method="post" name="SignIn" onSubmit="return validateLoginForm();">
                
                <p><input name="email" type="text" value="EMAIL" onFocus="HideLogin(this)"  onBlur="ShowLogin(this)" class="login-input" required></p>
           
                <?php
                 if(isset($_GET['link']))
                {
                    $link = $_GET['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                <p><input name="password" type="password" value="password" onFocus="HidePass(this)"  onBlur="ShowPass(this)" class="login-input" required></p><br>
                <p><input type="submit" value="LOGIN" class="login-submit"></p>
                <br>
            </form>
<?php
        }
    }
?>
<p align="center" style="color: #8f8f8f;">Dont have an account?</p>
<p align="center"><a href="signup.php" style="color: #000; text-decoration: none;">REGISTER</a></p>
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=SignIn"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=SignIn"><!--
//--></script>
<?php
    include "footer.php";
 ?>