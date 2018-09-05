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
                        <div class="date-news">
                            <b><?php echo $news->newsDate; ?></b>
                        </div>
                        <div class="title-news">
                            <b><?php echo $news->newsTitle; ?></b>
                        </div>
                        <div class="the-text">
                            <?php echo $news->newsDescription; ?>
                        </div>
                        <div class="the-image">
                            <img src="../../uploaded_images/news<?php echo "/".$news->idNews."/".$news->newsImage; ?>" height="150" onclick="showBox('mask');showDialogBox('img-box');"/>
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
                    
                </div>
            </div>
        </div>
          <div id="mask" class="dialog-mask">
                        <div class="dialog-box" id="img-box" >
                            <div class="close">
                                <a href="##"  onclick="hide('mask');hide('img-box');">
                                   <img src="../../images/close-box.png" height="20"/>
                                </a>
                            </div>
                          
                            <img class="img" src="../../uploaded_images/news<?php echo "/".$news->idNews."/".$news->newsImage; ?>"  id="imgs"  onContextMenu="return false;" alt=""></p>
                           <div class="close">
                            </div>
                        </div>
                  <script >
                           $(document).ready(function(){ 
                               var divwidth = $("#imgs").width();
                               divwidth = divwidth+40; 
                               var marginleft = (divwidth/2)-divwidth;

                               $("#img-box").css({'margin-left': marginleft+'px'});
                           }); 
                          
                            </script>
        </div>
<script language="Javascript" src="counter-uniq.php?page=uniq&&halaman=Shop"><!--
//--></script><script language="Javascript" src="counter-pgload.php?page=pgload&&halaman=Shop"><!--
//--></script>
        <?php
    include 'footer-up.php';
?>