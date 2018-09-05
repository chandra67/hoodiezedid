<?php

    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/newsModule.php";
    
    $news = new news();
    $news->newsTitle = $_POST['newsTitle'];
    $news->newsDescription = $_POST['newsDescription'];
    $news->newsAuthor = $_SESSION['idUser'];
    $news->newsCategory = $_POST['newsCategory'];
    $news->newsMetaKeyword = $_POST['newsMetaKeyword'];
    $news->newsMetaDescription = $_POST['newsMetaDescription'];
    
    
    $news->insertNews();