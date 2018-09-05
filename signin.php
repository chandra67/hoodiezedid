<?php
    include "modul/mainFunction.php";
    connect();
      global $current;
    $current ='Login';
    include "header.php";
    
     include "modul/customerModule.php";
?>
   
    <div class="menu" style="text-align: center;margin-top: 10vh; width: 250px;">
               
                    <p><a href="##" class="current">LOGIN</a></p>
                </div>
      <div class="content" style="padding-top: 0px;">
            <div class="mid-content" >
           
                <div class="mid-content-box" >
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
        <p align="center">Email and Password didnt match!</p>
         <form action="signin.php" method="post" name="SignIn" onSubmit="return validateLoginForm();">
                
            
                <p align="center"><input name="email" type="text" class="subs-input" value="<?php echo $customer->customerEmail; ?>" required></p>
          
                 <?php
                 if(isset($_POST['link']))
                {
                    $link = $_POST['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                <p align="center"><input name="password" type="password" class="subs-input" required></p><br>
                <p align="center"><input type="submit" value="Login" class="register-login"></p>
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
        <p align="center" style=" padding: 10px;"><b>Congratulations!</b> You are now registered.<br>
        Now you can login by fill up the form below</p>
 <?php
        }
  ?> 
        <form action="signin.php"  method="post" name="SignIn" onSubmit="return validateLoginForm();">
                
                <p align="center"><input name="email" placeholder="Email" type="text" class="subs-input" required></p>
               
                <?php
                 if(isset($_GET['link']))
                {
                    $link = $_GET['link'];
                    echo "<input type='hidden' name='link' value='".$link."'/>";
                }
                ?>
                <p align="center"><input name="password" type="password" placeholder="Password" class="subs-input" required></p><br>
                <p align="center"><input type="submit" value="Login" class="register-login"></p>
                <br>
            </form>
<?php
        }
    }
?>
    </div>
      </div>
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=SignIn"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=SignIn"><!--
//--></script>
<?php
    include "footer.php";
 ?>