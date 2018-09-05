           
                <table cellpadding="5" style="border-width: 1px; border-style: solid; border-color: #f3b72d; border-collapse: collapse;">
                    <tr bgcolor="#f3b72d">
                        <td><b>City<b></td>
                        <td><b>Fee<b></td>
                        <td><b>Action<b></td>
                    </tr>
                   <?php

                                    $city = new city();

                                    $cityView = $city->viewCity();
   
                                    for($i = 0; $i < count($cityView); $i++){
                              ?>
                               
                                    <tr><td><form name="updateStock" action='sales/update-rate.php' method="post" enctype='multipart/form-data'>
                                        <p><?php echo $cityView[$i]->cityName; ?></p>

                                        </td><td>
                                        Rp <input class="input-text" type=text name='cityShippingFee' size=15 value="<?php echo $cityView[$i]->cityShippingFee; ?>"  required>,-
                                        <input type=hidden name='idCity'  value="<?php echo $cityView[$i]->idCity; ?>"  required>
                                    </td><td><input type="submit" value="Update Fee" class="submit-button-auto"/></td></form></tr>
                                    
                            <?php
                                }
                            ?>
                        </table>
                <br />