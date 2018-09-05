    <?php
             $news = new news();
             $news->idNews = $_GET['newsno'];
             $news->setVar();
             
             $comment = new comment();
        $comment->commentHeaderId = $news->idNews;
        $comment->commentType = 'news';
        
             ?>
<h3>Manage Comment</h3>
                        <p><small><a href="news.php">Article</a> > <a href="#">Manage Comment</a></small></p><br>
                   <div class="news-box">
                        <div class="image">
                            <img src="crop.php?h=200&w=200&f=../uploaded_images/news/<?php echo $news->idNews."/".$news->newsImage; ?>" />
                        </div>
                        <div class="title">
                            <h3><?php echo $news->newsTitle; ?></h3>
                            <small><?php echo $news->newsDate; ?> - <a href="#"><?php echo $comment->countRow(); ?> Comment(s)</a> </small>
                        </div>
                        <div class="desc">
                            <p><?php echo $news->newsDescription; ?></p>
                        </div>
                        <div class="info">
                            <a href="../news-page.php?news=<?php echo $news->idNews; ?>&&title=<?php echo $news->newsTitle; ?>" target="_blank">Read more...</a>
                        </div>
                    </div>
<h3>Comments</h3>
<?php
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment->commentAuthor = $_POST['nama'];
            $comment->commentText = $_POST['comment'];
            $comment->commentEmail = $_POST['email'];
            
            if($comment->addComment()){
                echo "<script>alert(\"Comment posted!.\");</script>";
            }else{
                echo "<script>alert(\"Failed to post comment!.\");</script>";
            }
        }
        
        if($comment->countRow()==0){
            echo "<p>No comment yet!</p>";
        }else{
            $commentView = $comment->viewCommentList();
            for($i = 0; $i < count($commentView); $i++){
?>
                    <div class="comment-box">
                        <p><b><?php echo $commentView[$i]->commentAuthor; ?></b></p>
                        <p align="justify"><?php echo $commentView[$i]->commentText; ?></p><br>
                        <p><a href="news/delete-comment.php?commentno=<?php echo $commentView[$i]->idComment; ?>&&newsno=<?php echo $news->idNews; ?>">Delete</a></p>
                    </div>
                    
<?php
            } 
        }
        
?>
                    <br>
                    <form action="" method="post">
                        <h3>Write Comment</h3>
                        <table cellpadding="3" style="border-collapse:collapse;">
                            
                            <tr>
                                <td width="180">As <i><b><?php echo $user->steamName ?> (dD Admin)</b></i> <input type="hidden" name="nama" value="<i><?php echo $user->steamName ?> (dD Admin)</i>"></td>
                                <td width="520"><input type="hidden" name="email" value="no-email"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea name="comment" cols="133" rows="5" class="comment-input"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Post Comment" class="search-button"/></td>
                            </tr>
                        </table>
                    </form>