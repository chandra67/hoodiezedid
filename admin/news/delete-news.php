<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/newsModule.php";
    
   
    
  $news = new news();
  $news->idNews = $_GET['newsno'];
  
  if($news->deleteNews()){
         echo "<script>alert(\"News deleted!\");document.location = '../news.php';</script>";
    }else{
        echo "<script>alert(\"Error! deleteNews() failed.\");document.location = '../news.php';</script>";
    }
