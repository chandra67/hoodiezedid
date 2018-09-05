<?php
    include "../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../modul/userModule.php";
    
    
    $user = new user();
    $user->idUser = $_SESSION['idUser'];
    $user->setVar();
    
    global $current;
    $current ='Account';
    include "header.php";

?>
<div class="content">
	<div class="tab-menu-con">
    	<div class="tab-menu-visible">Account Settings</div>
        <div class="tab-menu-bot"></div>
    </div>
    <div class="tab-konten-con">
    	<div class="tab-konten-visible">
                <form name="changeName" action='change-information.php' method="post" >
                        <h3>Account Information</h3>
                            <table cellpadding=5 width="580">
                                <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='name' size=25 value="<?php echo $user->name;?>" required></td></tr>
                            <tr><td width=200><p align=left>Email</p></td><td width=500> <input class="input-text" type=text name='email' size=25 value="<?php echo $user->email;?>" required></td></tr>
                            <tr><td width=200><p align=left>Organization</p></td><td width=500> <input class="input-text" type=text name='organization' size=25 value="<?php echo $user->organization;?>" required></td></tr>
                            <tr><td width=200><p align=left>Steam Name</p></td><td width=500> <input class="input-text" type=text name='steamName' size=25 value="<?php echo $user->steamName;?>" required></td></tr>
                            <tr><td></td><td><p align=left><input type="submit" value="Update Information" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />
                <form name="changePass" action='change-pass.php' method="post" onSubmit="return validateChangePass();">
                            <h3>Change Password</h3>
                                <table cellpadding=5 width="580">
                                <tr><td width=200><p align=left>New Password</p></td><td width=500> <input class="input-text" type=password name='new1' size=25 required></td></tr>
                                <tr><td ><p align=left>Retype New Password</p></td><td> <input class="input-text" type=password name='new2' size=25 required></td></tr>
                                <tr><td ><p align=left>Old Password</p></td><td> <input class="input-text" type=password name='old' size=25 required></td></tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Password" class="submit-button-auto"/></p></td></tr>
                                </table>
               </form>
        </div>
        <div class="tab-menu-bot"></div>
   </div>
</div>
<?php
	include "footer.php";
?>