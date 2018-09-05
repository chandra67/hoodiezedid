<?php
    include 'modul/mainFunction.php';
    connect();
    global $current;
    $current ='DAILY';
    include 'header-up.php';
    include 'modul/newsModule.php';
    include 'modul/productModule.php';
    include 'modul/imageModule.php';
    
   $rowsPerPage = 6;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
        $pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;


    

    if(isset($_GET['category']))
    {
        $category= $_GET['category'];
    }
    if( $category == "all"){
        $category = 1;
    }
?>
        <div class="content">
          
            <div class="mid-content">
                <?php
                include 'daily-menu.php';
                ?>
                <div class="mid-content-box">
<?php
    $news = new news();
    $news->idCategory = $category;
    
   
        if($news->cekRowsPerCat()==0){
            echo "<p style='font-family: estre;' align='right'>We don't have article yet in ";
            echo $news->viewCategoryName($category)." category</p>";
        }

        $newsView = $news->setVarNews($offset, $rowsPerPage);
    
    
    $image = new image();
    $image->imageType = 'news';
    for($i = 0; $i < count($newsView); $i++){
        $image->imageHeaderId = $newsView[$i]->idNews;
?>
                  <div class="news-box">
                        <div class="date">
                            <p><b><?php echo $newsView[$i]->newsDate; ?></b></p>
                        </div>
                        <div class="news-title">
                            <p><b><?php echo strtoupper($newsView[$i]->newsTitle); ?></b></p>
                        </div>
                        <div class="news-desc">
                            <?php echo $newsView[$i]->newsDescription; ?>
                        </div>
                        <div class="view-more">
                            <p align="right"><b>CATEGORIES: <?php echo $newsView[$i]->viewCategoryName(); ?> | <a href="../../<?php echo strtolower($newsView[$i]->viewCategoryName()); ?>/<?php echo $newsView[$i]->idNews; ?>/<?php echo str_replace(" ", "-", $newsView[$i]->newsTitle); ?>">READ MORE</a></b></p>
                        </div>
                        <div class="news-img" style="background-image: url(../../uploaded_images/news<?php echo "/".$newsView[$i]->idNews."/".$newsView[$i]->newsImage; ?>); background-position: center top;">
                        </div>
                    </div>
<?php
    }    
?>
                    
                </div>
                <div class="page-num-con">
<?php
        echo $news->setPageNumber($pageNum, $rowsPerPage);
    
?>
                    </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Shop"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Shop"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>