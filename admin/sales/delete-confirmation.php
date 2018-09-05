<?php
    include "../../modul/mainFunction.php";
    connect();
    cekLoginAdmin();
    include "../../modul/salesModule.php";
    
   
    
  $confirmation = new confirmation();
  $confirmation->idConfirmation = $_GET['idConfirmation'];
  
  if($confirmation->deleteConfirmation()){
         echo "<script>alert(\"Confirmation Deleted!\");document.location = '../sales.php?tab=confirmation';</script>";
    }else{
        echo "<script>alert(\"Delete Confirmation Failed!\");document.location = '../sales.php?tab=confirmation';</script>";
    }
