<?php
    include "../modul/mainFunction.php";
    connect();
    include "../modul/userModule.php";
    
    if($_SESSION['signed_in'] == true){
        echo "<script>alert(\"You already logged in!\");document.location = 'dashboard.php';</script>";
    }
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PengrajinSitus Admin Page</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<link href="images/favicon.png" rel="shortcut icon" type="image.png"/>
<script src="Chart.js"></script>
<script src="fungsi.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
</head>

<body>
<div class="logo-login">
	<img src="images/logo-kecil.png" />
</div>
<?php
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new user();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            if(!$user->signInAdmin()){
?>
<p align="center" style="color:#FF0000"><b>Username and Password didnt match!</b></p>
<div class="login">
	<form enctype="multipart/form-data" action="" method="post" name="SignIn" onsubmit="return validateSignInForm();">
        <p>Email</p>
        <input type="text" name="email" class="login-input" value="<?php echo $user->email; ?>" required/>
        <p>Password</p>
        <input type="password" name="password" class="login-input" required/><br />
        <input type="submit" class="submit-button" value="login"/>
    </form>
</div>
<?php
            }else{
                echo "<script>document.location = 'dashboard.php';</script>";
            }
	
	}else{
?>
<div class="login">
	<form enctype="multipart/form-data" action="" method="post" name="SignIn" onsubmit="return validateSignInForm();">
        <p>Email</p>
        <input type="text" name="email" class="login-input" required/>
        <p>Password</p>
        <input type="password" name="password" class="login-input" required/><br />
        <input type="submit" class="submit-button" value="login"/>
    </form>
</div>
<?php
	}
?>
</body>
</html>


