<?php

    include "../../mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/newsModule.php";
    
    $news = new news();
    $news->newsCategory = $_POST['newsCategory'];
    
    
    $news->insertCategory();