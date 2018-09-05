<?php
    include '../modul/mainFunction.php';
    include '../modul/newsModule.php';
    include '../modul/productModule.php';
    connect();
    global $current;
    $current ='DAILY';

    $articlepage =true;
    if(isset($_GET['newsid']))
    {
        $newsid= $_GET['newsid'];
    }

      $news = new news();
    $news->idNews = $newsid;

    $news->setVar();
    $news->updateView();

    include 'header-up.php';
    
    


    

    if(isset($_GET['newsid']))
    {
        $newsid= $_GET['newsid'];
    }

      $news = new news();
    $news->idNews = $newsid;

    $news->setVar();
    $news->updateView();


    
    $category= $news->idCategory;
    
    
?>
            <div class="mobile-content">
               <?php
                include 'daily-menu.php';
                ?>
            </div>
            <div class="mobile-content">
                        <div class="date-news">
                            <b><?php echo $news->newsDate; ?></b>
                        </div>
                        <div class="title-news">
                            <b><?php echo $news->newsTitle; ?></b>
                        </div>
                        <div class="the-news-text">
                            <?php echo $news->newsDescription; ?>
                        </div>
                        <div class="the-image">
                            <img src="http://meraki.co.id/uploaded_images/news<?php echo "/".$news->idNews."/".$news->newsImage; ?>" />
                        </div>
                        <div class="the-share">
                            <span style="float: left; margin-top: 2px;"><b>SHARE THIS NEWS</b></span><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>"><img src="../../images/fb.png" height="20" style="float:left; margin-left: 5px;" /></a><a href="https://twitter.com/home?status=http%3A//meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>"><img src="../../images/tw.png" height="20" style="float:left; margin-left: 5px;" /></a>
                        </div>
            </div>

            <div class="fb-comment">
                <div class="the-judul">
                            COMMENTS
                </div>
                <div class="fb-comments"  data-href="http://meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>" data-numposts="5"></div>
            </div>
               
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=News"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=News"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>