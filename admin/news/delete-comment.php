<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/commentModule.php";
    
   
    
  $comment = new comment();
  $comment->idComment = $_GET['commentno'];
  $newsno = $_GET['newsno'];
  
  if($comment->deleteComment()){
         echo "<script>alert(\"Comment deleted!\");document.location = '../news.php?tab=news&&comment=yes&&newsno=".$newsno."';</script>";
    }else{
        echo "<script>alert(\"Error! deleteComment() failed.\");document.location = '../news.php?tab=news&&comment=yes&&newsno=".$newsno."';</script>";
    }
