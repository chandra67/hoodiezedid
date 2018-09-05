<?php
     
    
    
    $rowsPerPage = 15;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
	$pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;

   
    ?>
<div class="content-auto">
<?php
    $artist = new artist();
    if($artist->cekRows()==0){
        echo "<p>We don't have artist yet!</p>";
    }
    $artistView = $artist->setVarArtist($offset, $rowsPerPage);
    for($i = 0; $i < count($artistView); $i++){
?>
                    <div class="product-box" >
                        <img src="crop.php?h=200&w=200&f=../uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                        <div class="info">
                            <p><b><?php echo $artistView[$i]->artistName; ?></b></p>
                            <p><a href="artist.php?tab=artist&&edit=yes&&productno=<?php echo $artistView[$i]->idArtist; ?>">Edit Artist Information</a></p>
                            <p><a href="artist.php?tab=artist&&pictures=yes&&productno=<?php echo $artistView[$i]->idArtist; ?>">Manage Gallery</a></p>
                            <p><a href="artist/delete-artist.php?productno=<?php echo $artistView[$i]->idArtist; ?>" onClick="if(confirm('Are you sure you want to delete this product?')) {return true;}else{return false;}">Delete</a></p>
                        </div>
                    </div>
<?php
    }    
?>
</div>
<div class="page-num-con">
<?php
    echo $artist->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
     <br>
    <br>
</div>      