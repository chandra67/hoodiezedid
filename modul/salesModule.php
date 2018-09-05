<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
class sales{
    public $idSales;
    public $idCustomer;
    public $checkoutState;
    public $confirmationState;
    public $totalPrice;
    public $salesDate;
    public $idConfirmation;
    public $nextState;
    public $idDiscount;

    public function setVarSales($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(sales.salesDate,'%d %M %Y %h:%i %p') AS tglView FROM sales WHERE checkoutState = 'yes' ORDER BY idSales DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new sales();
            $obj->idSales = $r['idSales'];
            $obj->idCustomer = $r['idCustomer'];
            $obj->checkoutState = $r['checkoutState'];
            $obj->confirmationState = $r['confirmationState'];
            $obj->totalPrice = $r['totalPrice'];
            $obj->salesDate = $r['tglView'];
            $obj->idConfirmation = $r['idConfirmation'];
            $obj->nextState = $r['nextState'];
             $obj->idDiscount = $r['idDiscount'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }



     public function setVarSalesCus($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(sales.salesDate,'%d %M %Y %h:%i %p') AS tglView FROM sales WHERE confirmationState = 'unconfirmed' AND checkoutState = 'yes' AND idCustomer = '".$this->idCustomer."' ORDER BY idSales DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new sales();
            $obj->idSales = $r['idSales'];
            $obj->idCustomer = $r['idCustomer'];
            $obj->checkoutState = $r['checkoutState'];
            $obj->confirmationState = $r['confirmationState'];
            $obj->totalPrice = $r['totalPrice'];
            $obj->salesDate = $r['tglView'];
            $obj->idConfirmation = $r['idConfirmation'];
             $obj->nextState = $r['nextState'];
               $obj->idDiscount = $r['idDiscount'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

    public function setVarSalesHistory($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(sales.salesDate,'%d %M %Y %h:%i %p') AS tglView FROM sales WHERE confirmationState = 'confirmed' AND idCustomer = '".$this->idCustomer."' ORDER BY idSales DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new sales();
            $obj->idSales = $r['idSales'];
            $obj->idCustomer = $r['idCustomer'];
            $obj->checkoutState = $r['checkoutState'];
            $obj->confirmationState = $r['confirmationState'];
            $obj->totalPrice = $r['totalPrice'];
            $obj->salesDate = $r['tglView'];
            $obj->idConfirmation = $r['idConfirmation'];
             $obj->nextState = $r['nextState'];
               $obj->idDiscount = $r['idDiscount'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

     public function setVar(){
        $sql = "SELECT *, DATE_FORMAT(sales.salesDate,'%d %M %Y %h:%i %p') AS tglView FROM sales WHERE idSales='".$this->idSales."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        $this->idSales = $r['idSales'];
        $this->idCustomer = $r['idCustomer'];
        $this->checkoutState = $r['checkoutState'];
        $this->confirmationState = $r['confirmationState'];
        $this->totalPrice = $r['totalPrice'];
        $this->salesDate = $r['tglView'];
          $this->idDiscount = $r['idDiscount'];
    }

    public function setPageNumberAdmin($pageNum, $rowsPerPage){
            //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM sales WHERE checkoutState = 'yes'";
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows'];
                        
        
        //utk bikin link page number
        $maxPage = ceil($numrows/$rowsPerPage);
                        
        $self = $_SERVER['PHP_SELF'];
        $nav  = '';
        for($page = 1; $page <= $maxPage; $page++){
                if($page == $pageNum){
            $nav .= "<span class=\"page-num\">$page</span>";
                }else{
            $nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=sales&&page=$page\">$page</a></span> ";
                }
        }
        return $nav;
    }


    public function insertSales(){
      
        $sql = "INSERT INTO sales( idCustomer, idConfirmation, checkoutState, confirmationState, totalPrice, salesDate) VALUES ('$this->idCustomer', '$this->idConfirmation', '$this->checkoutState', '$this->confirmationState', '$this->totalPrice', NOW())";
        $hasil = mysql_query($sql);
        if($hasil){         
                 return mysql_insert_id();     
        }else{
                return false;          
        }
    }

    public function checkout(){
        $sql = "UPDATE sales SET checkoutState='yes', salesDate=NOW(),idCustomer='".$this->idCustomer."',totalPrice='".$this->totalPrice."',idDiscount='".$this->idDiscount."' WHERE idSales = '".$this->idSales."'";
    $runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }

      public function updateConfirmState(){
        $sql = "UPDATE sales SET confirmationState='".$this->confirmationState."' WHERE idSales = '".$this->idSales."'";
    $runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteSales(){
        
       $sql2 = "DELETE FROM sales WHERE idSales='".$this->idSales."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
}

class salesproduct{
    public $idSalesProduct;
    public $idSales;
    public $idProduct;
    public $idStock;
    public $productQuantity;


    public function insertSalesProduct(){
      
        $sql = "INSERT INTO salesproduct( idSales, idProduct, idStock, productQuantity) VALUES ('$this->idSales', '$this->idProduct', '$this->idStock', '$this->productQuantity')";
        $hasil = mysql_query($sql);
        if($hasil){         
                 return true;     
        }else{
                return false;          
        }
    }

     public function selectProduct(){
        $sql = "SELECT * FROM salesproduct WHERE idSales='".$this->idSales."' ORDER BY idSalesProduct DESC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new salesproduct();
            $obj->idSalesProduct = $r['idSalesProduct'];
            $obj->idSales = $r['idSales'];
            $obj->idProduct = $r['idProduct'];
            $obj->idStock = $r['idStock'];
            $obj->productQuantity = $r['productQuantity'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

    public function cekRowPerSales(){
        //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM salesproduct WHERE idSales=".$this->idSales;
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows']; 
        
            return $numrows;
        }

     public function deleteSalesProduct(){
        
       $sql2 = "DELETE FROM salesproduct WHERE idSalesProduct='".$this->idSalesProduct."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }
    public function deleteSalesProductPerSales(){
        
       $sql2 = "DELETE FROM salesproduct WHERE idSales='".$this->idSales."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }
}

class confirmation{
    public $idConfirmation;
    public $idSales;
    public $confirmationName;
    public $confirmationEmail;
    public $pemilikRek;
    public $totalPayment;
    public $paymentDate;
    public $confirmationNote;
    public $yourBank;
    public $toBank;


    public function insertConfirmation(){
      
        $sql = "INSERT INTO confirmation( idSales, confirmationName, confirmationEmail, pemilikRek, totalPayment, paymentDate, confirmationNote, yourBank, toBank) VALUES ('$this->idSales', '$this->confirmationName', '$this->confirmationEmail', '$this->pemilikRek', '$this->totalPayment', '$this->paymentDate', '$this->confirmationNote', '$this->yourBank', '$this->toBank')";
        $hasil = mysql_query($sql);
        if($hasil){         
                 return true;     
        }else{
                return false;          
        }
    }

     public function selectConfirmation($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(confirmation.paymentDate,'%d %M %Y') AS tglView  FROM confirmation ORDER BY idConfirmation DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new confirmation();
            $obj->idConfirmation = $r['idConfirmation'];
            $obj->idSales = $r['idSales'];
            $obj->confirmationName = $r['confirmationName'];
            $obj->confirmationEmail = $r['confirmationEmail'];
            $obj->pemilikRek = $r['pemilikRek'];
            $obj->totalPayment = $r['totalPayment'];
            $obj->paymentDate = $r['tglView'];
            $obj->confirmationNote = $r['confirmationNote'];
            $obj->yourBank = $r['yourBank'];
            $obj->toBank = $r['toBank'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function setPageNumberAdmin($pageNum, $rowsPerPage){
            //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM confirmation";
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows'];
                        
        
        //utk bikin link page number
        $maxPage = ceil($numrows/$rowsPerPage);
                        
        $self = $_SERVER['PHP_SELF'];
        $nav  = '';
        for($page = 1; $page <= $maxPage; $page++){
                if($page == $pageNum){
            $nav .= "<span class=\"page-num\">$page</span>";
                }else{
            $nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=confirmation&&page=$page\">$page</a></span> ";
                }
        }
        return $nav;
    }

     public function setVar(){
        $sql = "SELECT *, DATE_FORMAT(confirmation.paymentDate,'%d %M %Y') AS tglView FROM confirmation WHERE idConfirmation='".$this->idConfirmation."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
         $this->idConfirmation = $r['idConfirmation'];
            $this->idSales = $r['idSales'];
            $this->confirmationName = $r['confirmationName'];
            $this->confirmationEmail = $r['confirmationEmail'];
            $this->pemilikRek = $r['pemilikRek'];
            $this->totalPayment = $r['totalPayment'];
            $this->paymentDate = $r['tglView'];
            $this->confirmationNote = $r['confirmationNote'];
            $this->yourBank = $r['yourBank'];
            $this->toBank = $r['toBank'];
    }

    

     public function deleteConfirmation(){
        
       $sql2 = "DELETE FROM confirmation WHERE idConfirmation='".$this->idConfirmation."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }
   
}

class code{
    public $voucherCode;
    public $codeDiscount;
    public $codeQuantity;
    public $idUser;


    public function insertCode(){
      
        $sql = "INSERT INTO discountcode( voucherCode, codeDiscount, codeQuantity, idUser) VALUES ('$this->voucherCode', '$this->codeDiscount', '$this->codeQuantity', '$this->idUser')";
        $hasil = mysql_query($sql);
        if($hasil){         
                 return true;     
        }else{
                return false;          
        }
    }

     public function setVar(){
        $sql = "SELECT *  FROM discountcode WHERE voucherCode ='".$this->voucherCode."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
            $this->voucherCode = $r['voucherCode'];
            $this->codeQuantity = $r['codeQuantity'];
            $this->codeDiscount = $r['codeDiscount'];
            $this->idUser = $r['idUser'];
    }


    public function cekCode(){
        //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM discountcode WHERE voucherCode='".$this->voucherCode."' AND codeQuantity > 0";
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows']; 
        
            return $numrows;
        }


    
   
}