
                 <form action='customer/send-newsletter.php' method="post" enctype='multipart/form-data'>
                        <h3>Newsletter</h3>
                        <small>beta</small>
                        <table cellpadding="3">
                           <tr>
                             <td>Banner<br><small>format: jpg/jpeg/png<br> size: <2MB<br> recommended orientation: potrait </small></td>
                             <td width="400"><input name='picture' type='file' class="input-text" /></p></td>
                         </tr>
                                  
   
                                <tr><td width=200><p align=left>Newsletter Subject</p></td><td width=400> <input class="input-text" type=text name='subject'  size=55  required></td></tr>
                        <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="message" cols="150" rows="35"></textarea></td>
                                </tr>
                                <tr><td></td><td><p align=left><input type="submit" value="Send Newsletter" class="submit-button-auto"/></p></td></tr>
                            </table>
                 </form><br />

               