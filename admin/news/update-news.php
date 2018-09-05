<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/newsModule.php";
    
    $news = new news();
    $news->idNews = $_POST['idNews'];
    $news->newsTitle = $_POST['newsTitle'];
    $news->newsCategory = $_POST['newsCategory'];
    $news->newsDescription = $_POST['newsDescription'];
    $news->newsAuthor = $_SESSION['idUser'];
    $news->newsMetaKeyword = $_POST['newsMetaKeyword'];
    $news->newsMetaDescription = $_POST['newsMetaDescription'];
    $file = $_FILES['picture'];
    
    
     if ( isset( $file ) ) {
     
         $news->insertNewsPictures2($news->idNews);
         
     }
    
    if($news->updateNews($image)){
        echo "<script>alert(\"News updated!\");document.location = '../news.php?tab=news&&edit=yes&&newsno=".$news->idNews."';</script>";
    }else{
        echo "<script>alert(\"Error, updateArticle() failed!\");document.location = '../news.php?tab=news&&edit=yes&&newsno=".$news->idNews."';</script>";
    }