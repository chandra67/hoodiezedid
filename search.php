<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='none';
    include 'header.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    include 'modul/artistModule.php';
    
  
?>
        <div class="content">
          
            <div class="mid-content">
                 <div class="title">
                    <a href="##">PRODUCT SEARCH RESULT</a>
                </div>
                <div class="mid-content-box">
<?php
    $product = new product();
    
    $search = $_POST['search'];

     $productView = $product->searchProduct($search);
    if(empty($productView)){
        echo "Your search returned zero results.";
    }else{
    
        $image = new image();
        $image->imageType = 'product';
        for($i = 0; $i < count($productView); $i++){
            $image->imageHeaderId = $productView[$i]->idProduct;
    ?>
                        <div class="product-box-noshadow" onclick="location.href='product/<?php echo $productView[$i]->idProduct; ?>/<?php echo str_replace(" ", "-", $productView[$i]->productName); ?>';" style="background-image: url(uploaded_images/<?php echo $image->imageType."/".$image->imageHeaderId."/".$image->viewPrimary(); ?>); background-position: center top; background-size:282px 282px; background-repeat: no-repeat;">
                            
                            <div class="view">
                               
                            </div>
                           
                            
                        </div>
    <?php
        }  
    }  
?>
                </div>
               <div class="title">
                    <a href="##">ARTIST SEARCH RESULT</a>
                </div>
                <div class="mid-content-box">
<?php
     $artist = new artist();
    

     $artistView = $artist->searchArtist($search);
    if(empty($artistView)){
        echo "Your search returned zero results.";
    }else{
    
        for($i = 0; $i < count($artistView); $i++){
    ?>
                        <div class="artist-box" >
                            <a href='artist/<?php echo $artistView[$i]->idArtist; ?>/<?php echo str_replace(" ", "-", $artistView[$i]->artistName); ?>'>
                                <img src="uploaded_images/artist/<?php echo $artistView[$i]->idArtist."/".$artistView[$i]->artistPicture; ?>" />
                                <p><?php echo strtoupper($artistView[$i]->artistName); ?></p>
                            </a>
                        </div>
    <?php
        }  
    }  
?>
                </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Search"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Search"><!--
//--></script>
        <?php
    include 'footer.php';
?>