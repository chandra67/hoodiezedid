<?php
/**
 * @author Taufik of PengrajinSitus.com
 */

class stock{
    public $idProduct;
    public $idStock;
    public $stockName;
    public $stockQuantity;
    public $lastUpdate;

    public function setVarStock(){
        $sql = "SELECT *, DATE_FORMAT(stock.lastUpdate,'%d %M %Y %h:%i %p') AS tglView FROM stock WHERE idProduct=".$this->idProduct." ORDER BY idProduct DESC";
	   $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new stock();
            $obj->idProduct = $r['idProduct'];
            $obj->idStock = $r['idStock'];
            $obj->stockName = $r['stockName'];
            $obj->stockQuantity = $r['stockQuantity'];
            $obj->lastUpdate = $r['tglView'];
            array_push($arrayObj, $obj);
	   }
        return $arrayObj;
    }

     public function setVarCart(){
        $sql = "SELECT * FROM stock WHERE idStock=".$this->idStock;
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                $this->idStock = $r['idStock'];
                $this->stockName = $r['stockName'];
            }
        }
    }

    public function cekStock(){
        
    $query   = "SELECT SUM(stockQuantity) AS totalQuantity FROM stock WHERE idProduct=".$this->idProduct;
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $totalQuantity = $row['totalQuantity']; 
    
        return $totalQuantity;
    }
    
     public function updateStock(){
        $sql = "UPDATE stock SET stockName='".$this->stockName."', stockQuantity='".$this->stockQuantity."' WHERE idStock = '".$this->idStock."'";
	$runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }
    
     public function deleteStock(){
        
       $sql2 = "DELETE FROM stock WHERE idStock='".$this->idStock."'";
	$hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }

    public function insertStock(){
      
                    $sql = "INSERT INTO stock( stockName, stockQuantity, idProduct, lastUpdate) VALUES ('$this->stockName','$this->stockQuantity','$this->idProduct', NOW())";
                    $hasil = mysql_query($sql);
                    if($hasil){         
                        return true;
                    }else{
                        return false;
                    }
                
       }
    
}
