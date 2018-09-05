           
                 <form name="artist" action='artist/insert-artist.php' method="post" enctype='multipart/form-data'>
                     <table cellpadding="3">
                         <tr>
                             <td>Artist Picture<br><small>(format: jpg/jpeg/png, size: <2MB, square orientation) </small></td>
                             <td><input name='picture' type='file' class="input-text" required></p></td>
                         </tr>
                                <tr><td width=200><p align=left>Name</p></td><td width=500> <input class="input-text" type=text name='artistName' size=25  required></td>
                            </tr>
                             <tr>
                                    <td>
                                        <p>Age</p>
                                    </td>
                                    <td>
                                        <input class="input-text" type=text name='artistAge' size=25  required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Gender</p>
                                    </td>
                                    <td>
                                        <select name="artistGender" class="input-select">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>City</p>
                                    </td>
                                    <td>
                                         <input class="input-text" type=text name='artistCity' size=25  required> 
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>Focus</p>
                                    </td>
                                    <td>
                                         <input class="input-text" type=text name='artistFocus' size=25  required> 
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <p>Embed Video</p>
                                    </td>
                                    <td>
                                         <textarea name="artistVideo" cols="50" rows="6">no</textarea>
                                    </td>
                                </tr>
                                 <tr>
                                     <td colspan="2">
                                        <p>About</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="ckeditor" name="artistAbout" cols="120" rows="7"></textarea></td>
                                </tr>
                            <tr><td></td><td><p align=left><input type="submit" value="Add Artist" class="submit-button-auto"/></p></td></tr>
                            </table>
                </form><br />