  <?php
  		$testi = new setting();
      
    ?>
                 <form action='sales/update-notification.php' method="post" enctype='multipart/form-data'>
                  <h3>Payment Detail</h3>
                    
                        <table cellpadding="3">
                         
    <?php
         $testi->idSetting = 'paymentDetail';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2" width="500"><textarea class="ckeditor" name="paymentDetail" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                
                            </table><br><br>

                 <h3>Confirmation Detail & Footnote</h3>
                    
                        <table cellpadding="3">
                         
    <?php
         $testi->idSetting = 'confirmationDetail';
        $testi->selectSetting();
    ?>
                                <tr>
                                    <td colspan="2" width="500"><textarea class="ckeditor" name="confirmationDetail" cols="150" rows="35"><?php echo $testi->settingDescription; ?></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Update Setting" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />