<?php
    include "../../mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/newsModule.php";
    
   
    
  $news = new news();
  $news->newsCategory = $_GET['categoryno'];
  
  if($news->deleteCategory()){
         echo "<script>alert(\"Category deleted!\");document.location = '../news.php?tab=addnew&&category=yes';</script>";
    }else{
        echo "<script>alert(\"Error! deleteCategory() failed.\");document.location = '../news.php?tab=addnew&&category=yes';</script>";
    }
