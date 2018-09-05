<?php
    include 'modul/mainFunction.php';
    include 'modul/newsModule.php';
    include 'modul/productModule.php';
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
        <div class="content">
           
            <div class="mid-content">
               <?php
                include 'daily-menu.php';
                ?>
                <div class="mid-content-box">
                    <div class="news-text">
                            <img src="../../uploaded_images/news<?php echo "/".$news->idNews."/".$news->newsImage; ?>" width="1160" />
                    </div>
                    <div class="tutorial-text">
                        <p><b><?php echo $news->newsTitle; ?></b></p>
                         <?php echo $news->newsDescription; ?>
                         <div class="the-share">
                            <span style="float: left; margin-top: 2px;"><b>SHARE THIS TUTORIAL</b></span><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>"><img src="../../images/fb.png" height="20" style="float:left; margin-left: 5px;" /></a><a href="https://twitter.com/home?status=http%3A//meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>"><img src="../../images/tw.png" height="20" style="float:left; margin-left: 5px;" /></a>
                        </div>
                    </div>
                    <div class="fb-comment">
                        <div class="the-judul">
                            COMMENTS
                        </div>
                        <div class="fb-comments"  data-href="http://meraki.co.id/<?php echo strtolower($news->viewCategoryName()); ?>/<?php echo $news->idNews; ?>/<?php echo str_replace(" ", "-", $news->newsTitle); ?>" data-numposts="5"></div>
                    </div>
                    
                </div>
            </div>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Shop"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Shop"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>