<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='THE ARTIST';
    include 'header-up.php';
    include '../modul/artistModule.php';
    include '../modul/imageModule.php';
    
 
?>
            <div class="mobile-content">
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
                <p>ARTIST BY ALPHABET (<?php echo $_GET['alpha']; ?>)</p>
                <div style="width: 100%; height: auto; overflow: auto;">
                        <div class="artist-image" >
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artist->idArtist."/".$artist->artistPicture; ?>"  class="image-zoom" />
                        </div>
                        <div class="artist-info">
                            <p>Artist: <?php echo $artist->artistName; ?></p>
                            <!--<p><span class="label-artist">Age</span>: <span class="data-artist"><?php echo $artist->artistAge; ?></span></p>-->
                            <p>Gender: <?php echo $artist->artistGender; ?></p>
                            <p>City: <?php echo $artist->artistCity; ?></p>
                            <!--<p><span class="label-artist">Focus</span>: <span class="data-artist"><?php echo $artist->artistFocus; ?></span></p>-->
                            <p>About: <?php echo $artist->artistAbout; ?></p>
                        </div>   
                </div>
            </div>
<?php
    }else{
        echo "<p>404 not found!</p>";
    }

    if($artist->artistVideo == "no" || $artist->artistVideo == ""){
    }else{
?>
                <div class="mobile-content">
                    <?php
                        echo $artist->artistVideo;  
                    ?>
                </div>
<?php

    }
?>              
                <div class="mobile-content">
                    <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                        <div class="pictures-box" onclick="showBox('mask');showBox(<?php echo $i; ?>);">
                            <img src="http://www.meraki.co.id/uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" ontouchstart="showBox('<?php echo $i; ?>');" onclick="showBox('<?php echo $i; ?>');" />
                        </div>
                    <?php
                        }
                    ?>
                </div>
               
             <?php
                        for($i = 0; $i < count($imageView); $i++){    
                    ?>
                     <div id="<?php echo $i; ?>" class="dialog-mask">
                            <img class="x" src="../../images/close-box.png" height="20"  ontouchstart="hide('<?php echo $i; ?>');" onclick="hide('<?php echo $i; ?>');"/>
                            <img class="art" src="http://www.meraki.co.id/uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$imageView[$i]->imageUrl; ?>" id="image-<?php echo $i; ?>"  onContextMenu="return false;" alt="">
                    </div>
                    <?php
                        }
                    ?>
       
     
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=ArtistPage"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=ArtistPage"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>