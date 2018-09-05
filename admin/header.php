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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body onload="startTime()">
<div class="logo"><img src="images/logo.png" height="60"/></div>
<div class="top-nav">
	<div class="top-nav-box"><p>Welcome <?php echo $user->name;?></p></div>
    <?php
		if($current == 'Account'){
	?>
    <div class="top-nav-box"><a href="account-settings.php" class="current">Account Settings</a></div>
    <?php
		}else{
	?>
    <div class="top-nav-box"><a href="account-settings.php">Account Settings</a></div>
    <?php
		}	
	?>
    <div class="top-nav-box"><a href="signout.php">Logout</a></div>
</div>
<div class="top-nav-back"></div>
<div class="time">
	<p>
	<?php
		$now = date("l, j F Y");
		echo $now; 
	?>
    Pukul <span id="time"></span>
    </p>
</div>
<div class="left-nav">
	<?php
        $arrayMenu = array("Dashboard","Sales","Customer","Product","Slideshow","Settings","Help");
        $arrayMenuUrl = array("dashboard.php","sales.php","customer.php","product.php","slideshow.php","other.php","help.php");
        $arrayMenuIcon = array("home.png","news.png","member.png","slide.png","slide.png","setting.png","help.png");
        for($i = 0; $i < count($arrayMenu); $i++){
            if($current == $arrayMenu[$i]){
                echo "<div class=\"left-nav-button\" ><a href=\"".$arrayMenuUrl[$i]."\" class=\"current\"><img src=\"images/".$arrayMenuIcon[$i]."\">".$arrayMenu[$i]."</a></div>";
            }else{
                echo "<div class=\"left-nav-button\" ><a href=\"".$arrayMenuUrl[$i]."\"><img src=\"images/".$arrayMenuIcon[$i]."\">".$arrayMenu[$i]."</a></div>";
            }
        }
        ?>
</div>