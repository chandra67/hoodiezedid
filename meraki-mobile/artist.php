<?php
    include '../modul/mainFunction.php';
    connect();
    global $current;
    $current ='THE ARTIST';
    include 'header-up.php';
    include '../modul/artistModule.php';
    
  
?>
        <div class="mobile-content">
                   <p>
                     ARTIST BY ALPHABET (A-E)

                    </p><br>
<?php
    $artist = new artist();

    $artistView = $artist->selectAE();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                   <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/alpha=A-E&&<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtok(strtoupper($artistView[$i]->artistName), " "); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                <div class="mobile-content">
                   <p>
                     ARTIST BY ALPHABET (F-J)

                    </p><br>
<?php

    $artistView = $artist->selectFJ();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/alpha=F-J&&<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtok(strtoupper($artistView[$i]->artistName), " "); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                <div class="mobile-content">
                   <p>
                     ARTIST BY ALPHABET (K-O)

                    </p><br>
<?php

    $artistView = $artist->selectKO();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/alpha=K-O&&<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtok(strtoupper($artistView[$i]->artistName), " ");?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                 <div class="mobile-content">
                   <p>
                    ARTIST BY ALPHABET (P-T)

                    </p><br>
<?php

    $artistView = $artist->selectPT();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                   <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/alpha=P-T&&<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtok(strtoupper($artistView[$i]->artistName), " "); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                 <div class="mobile-content">
                   <p>
                     ARTIST BY ALPHABET (U-Z)

                    </p><br>
<?php

    $artistView = $artist->selectUZ();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/alpha=U-Z&&<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="http://www.meraki.co.id/uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtok(strtoupper($artistView[$i]->artistName), " "); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
          
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Artist"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Artist"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>