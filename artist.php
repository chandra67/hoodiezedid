<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='THE ARTIST';
    include 'header-up.php';
    include 'modul/artistModule.php';
    
  
?>
        <div class="content">
            <div class="mid-content">
                <div class="title">
                   <p>
                     <a href="##" >ARTIST BY ALPHABET (A-E)</a> 

                    </p>
                </div>
                <div class="mid-content-box">
<?php
    $artist = new artist();

    $artistView = $artist->selectAE();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                   <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="../../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                <div class="title">
                   <p>
                     <a href="##" >ARTIST BY ALPHABET (F-J)</a> 

                    </p>
                </div>
                <div class="mid-content-box">
<?php

    $artistView = $artist->selectFJ();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="../../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                 <div class="title">
                   <p>
                     <a href="##" >ARTIST BY ALPHABET (K-O)</a> 

                    </p>
                </div>
                <div class="mid-content-box">
<?php

    $artistView = $artist->selectKO();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="../../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtoupper($artistView[$i]->artistName);?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                 <div class="title">
                   <p>
                     <a href="##" >ARTIST BY ALPHABET (P-T)</a> 

                    </p>
                </div>
                <div class="mid-content-box">
<?php

    $artistView = $artist->selectPT();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                   <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="../../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
                 <div class="title">
                   <p>
                     <a href="##" >ARTIST BY ALPHABET (U-Z)</a> 

                    </p>
                </div>
                <div class="mid-content-box">
<?php

    $artistView = $artist->selectUZ();
    
  
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="artist-box" >
                        <a href='../../artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                            <img src="../../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                            <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                        </a>
                    </div>
<?php
    }    
?>
                </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Artist"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Artist"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>