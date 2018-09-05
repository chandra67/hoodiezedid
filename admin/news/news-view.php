<?php
  
    $rowsPerPage = 5;
    $pageNum = 1;
    if(isset($_GET['page']))
    {
	$pageNum = $_GET['page'];
    }
    $offset = ($pageNum - 1) * $rowsPerPage;
?>
<?php
    $news = new news();
    if($news->cekRows()==0){
       echo "<p>You don't have article yet! click \"Add Article\" to begin!</p>";
    }
    $newsView = $news->setVarNewsAdmin($offset, $rowsPerPage);
    $comment = new comment();
    $comment->commentType='news';
    for($i = 0; $i < count($newsView); $i++){
        $comment->commentHeaderId = $newsView[$i]->idNews;
?>
                    <div class="news-box">
                        <div class="image">
                            <img src="crop.php?h=200&w=200&f=../uploaded_images/news/<?php echo $newsView[$i]->idNews."/".$newsView[$i]->newsImage; ?>" />
                        </div>
                        <div class="title">
                            <h3><?php echo $newsView[$i]->newsTitle; ?></h3>
                            <small><?php echo $newsView[$i]->newsDate; ?> - <a href="#"><?php echo $newsView[$i]->newsView; ?> View(s)</a> - <a href="#">Categories: <?php echo $newsView[$i]->viewCategoryName(); ?></a> </small>
                        </div>
                        <div class="desc">
                            <p><?php echo $newsView[$i]->newsDescription; ?></p>
                        </div>
                        <div class="info">
                            <p><a href="news.php?tab=news&&edit=yes&&newsno=<?php echo $newsView[$i]->idNews; ?>">Edit News</a> <a href="news/delete-news.php?newsno=<?php echo $newsView[$i]->idNews; ?>" onClick="if(confirm('Are you sure you want to delete this article?')) {return true;}else{return false;}">Delete</a></p>
                        </div>
                    </div>
<?php
    }    
?>
                    <div class="page-num-con">
<?php
    echo $news->setPageNumberAdmin($pageNum, $rowsPerPage);
?>
                        <br>
                        <br>
                    </div>
