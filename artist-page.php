<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='THE ARTIST';
    include 'header-up.php';
    include 'modul/artistModule.php';
    include 'modul/imageModule.php';
    
 
?>
        <div class="content">
            <div class="mid-content">
                <?php
                 if(isset($_GET['artistno']))
    {
        $idArtist = $_GET['artistno'];
        $artist = new artist();
        $artist->idArtist = $idArtist;
        $artist->setVar();
        $image = new image();
        $image->imageType = 'artist';
        $image->imageHeaderId = $artist->idArtist;
        
        $rowsPerPage = 50;
        $pageNum = 1;
        $offset = ($pageNum - 1) * $rowsPerPage;
        $sort = "ASC";
        $imageView = $image->setVarImage($offset, $rowsPerPage, $sort);
?>
                <div class="title">
                    <a href="../../artist/all/"><span style="font-size: 50px;vertical-align: middle;float: left;">ARTIST PAGE |</a></span><div style="padding-left: 5px;padding-top: 20px;float:left"><?php echo strtoupper($artist->artistName); ?></div>
                </div>
                <div class="mid-content-box">
                        <div class="artist-image" >
                            <img src="../../uploaded_images/artist/<?php echo $artist->idArtist."/".$artist->artistPicture; ?>" width="300" height="300" class="image-zoom" />
                        </div>
                        <div class="artist-info">
                            <p><span class="label-artist">Artist</span><span class="mid-label">:</span> <span class="data-artist"><?php echo $artist->artistName; ?></span></p>
                            <!--<p><span class="label-artist">Age</span>: <span class="data-artist"><?php echo $artist->artistAge; ?></span></p>-->
                            <p><span class="label-artist">Gender</span><span class="mid-label">:</span> <span class="data-artist"><?php echo $artist->artistGender; ?></span></p>
                            <p><span class="label-artist">City</span><span class="mid-label">:</span> <span class="data-artist"><?php echo $artist->artistCity; ?></span></p>
                            <!--<p><span class="label-artist">Focus</span>: <span class="data-artist"><?php echo $artist->artistFocus; ?></span></p>-->
                            <div class="about"><span class="label">About </span><span class="mid-label">:</span> <?php echo $artist->artistAbout; ?></div>
                        </div>   
                </div>
<?php
    }else{
        echo "<p>404 not found!</p>";
    }

    if($artist->artistVideo == "no" || $artist->artistVideo == ""){
    }else{
?>
                <div class="title">
                    <a href="##"><span style="font-size: 30px;">VIDEO</a>
                </div>
                <div class="mid-content-box">
                    <?php
                        echo $artist->artistVideo;  
                    ?>
                </div>
<?php

    }
?>              <div class="title">
                    <a href="##"><span style="font-size: 30px;">GALLERIES</a>
                </div>
                <div class="mid-content-box">
                    <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                        <div class="pictures-box" onclick="showDialogBox(<?php echo $i; ?>);showBox('mask-<?php echo $i; ?>');" style="background-image: url(../../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$imageView[$i]->imageUrl; ?>); background-size: cover;">
                         
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
         <div class="dialog-mask-trans">
             <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                    <div id="mask-<?php echo $i; ?>" class="dialog-mask"  onclick="hide('mask-<?php echo $i; ?>');hide('<?php echo $i; ?>');">
                    </div>

                        <div class="dialog-box" id="<?php echo $i; ?>" >
                            <div class="close">
                                <a href="##"  onclick="hide('mask-<?php echo $i; ?>');hide('<?php echo $i; ?>');">
                                   <img src="../../images/close-box.png" height="20"/>
                                </a>
                            </div>
                          
                            <img class="img" src="../../uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" id="image-<?php echo $i; ?>"  onContextMenu="return false;" alt=""></p>
                           <div class="close">
                            </div>
                           
                        </div>
                  
                              <script >
                           $(document).ready(function(){ 
                               var divwidth = $("#image-<?php echo $i; ?>").width();
                               divwidth = divwidth+40; 
                               var marginleft = (divwidth/2)-divwidth;

                               $("#<?php echo $i; ?>").css({'margin-left': marginleft+'px'});
                           }); 
                          
                            </script> 
                    <?php
                        }
                    ?>
            </div>
       
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=ArtistPage"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=ArtistPage"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>