<?php
    include "modul/mainFunction.php";
    connect();
    include "header.php";
    

  
?>
 <div class="menu" style="padding-top: 40px;text-align: left;">
              <a href="account-setting.php" >Your Account</a>
               <a href="##" class="current">Change Password</a>
                <a href="confirmation.php">Confirmation</a>
                <a href="history.php">History</a>
          </div>
    <div class="content">

      <div class="mid-content">
         
          <div class="mid-content-box" style="text-align: left;">
             
                
                <form name="changePass" action='change-pass.php' method="post" onSubmit="return validateChangePass();">
                            <p align="left"><b></b></p>
                                <table cellpadding=5  >
                                <tr><td width="160"><p align=left>New Password</p></td><td width="390"> <input class="subs-input" type=password name='new1' size=25 required></td></tr>
                                <tr><td ><p align=left>Retype New Password</p></td><td> <input class="subs-input" type=password name='new2' size=25 required></td></tr>
                                <tr><td ><p align=left>Old Password</p></td><td> <input class="subs-input" type=password name='old' size=25 required></td></tr>
                                <tr><td></td><td><p align=left><input type="submit" value="UPDATE PASSWORD" class="small-button"/></p></td></tr>
                                </table>
               </form>
          </div>
      </div>
    </div>
    <script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=AccountSetting"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=AccountSetting"><!--
//--></script>
<?php
    include "footer.php";
 ?>