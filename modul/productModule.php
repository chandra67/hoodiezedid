<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
define("PRODUK_TABLE","product");
define("PRODUK_SORT","idProduct");

class product{
    public $idProduct;
    public $idArtist;
    public $productPrice;
    public $productDescription;
    public $productName;
    public $productType;
    public $productAuthor;
    public $productDiscount;
    public $productAvailability;
    public $productPermalink;
    public $featured;
    public $productTypeName;
    public $productTypePermalink;
    public $productWeight;

    public function setVarProduct($offset, $rowsPerPage){
        $sql = "SELECT * FROM ".PRODUK_TABLE." ORDER BY ".PRODUK_SORT." DESC LIMIT $offset, $rowsPerPage ";
	   $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
            $obj->idArtist = $r['idArtist'];
            $obj->productPrice = $r['productPrice'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->featured = $r['featured'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->productAvailability = $r['productAvailability'];
            $obj->productPermalink = $r['productPermalink'];
            $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
	   }
        return $arrayObj;
    }

    public function searchProduct($searchWord){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE productName LIKE '%".$searchWord."%' OR productDescription LIKE '%".$searchWord."%' ORDER BY productName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
            $obj->idArtist = $r['idArtist'];
            $obj->productPrice = $r['productPrice'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->featured = $r['featured'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->productAvailability = $r['productAvailability'];
             $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

    public function selectFeatured($limit){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE featured='yes' ORDER BY ".PRODUK_SORT." DESC LIMIT $limit ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
             $obj->idArtist = $r['idArtist'];
            $obj->productPrice = $r['productPrice'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->productAvailability = $r['productAvailability'];
             $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
    public function selectNewest($limit){
        $sql = "SELECT * FROM ".PRODUK_TABLE." ORDER BY ".PRODUK_SORT." DESC LIMIT $limit ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
             $obj->idArtist = $r['idArtist'];
            $obj->productPrice = $r['productPrice'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->productAvailability = $r['productAvailability'];
              $obj->productPermalink = $r['productPermalink'];
               $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
    public function selectRandom($limit){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE featured='yes' ORDER BY RAND() DESC LIMIT 0,$limit ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
            $obj->productPrice = $r['productPrice'];
             $obj->idArtist = $r['idArtist'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->productAvailability = $r['productAvailability'];
              $obj->productPermalink = $r['productPermalink'];
               $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function setVarProductPerCat($offset, $rowsPerPage){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE productType=".$this->productType." ORDER BY ".PRODUK_SORT." DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->idProduct = $r['idProduct'];
            $obj->productPrice = $r['productPrice'];
             $obj->idArtist = $r['idArtist'];
            $obj->productDescription = $r['productDescription'];
            $obj->productName = $r['productName'];
            $obj->productType = $r['productType'];
            $obj->productAuthor = $r['productAuthor'];
            $obj->productDiscount = $r['productDiscount'];
            $obj->featured = $r['featured'];
            $obj->productAvailability = $r['productAvailability'];
            $obj->productPermalink = $r['productPermalink'];
             $obj->productWeight = $r['productWeight'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function setVarProductType(){
        $sql = "SELECT * FROM producttype ORDER BY typeName ASC ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new product();
            $obj->productTypeName = $r['typeName'];
            $obj->productType = $r['idType'];
            $obj->productTypePermalink = $r['permalink'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function printCatName($cat){
        $sql = "SELECT * FROM producttype WHERE idType=".$cat." ";
       $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            return $r['typeName'];
       }
    }
    public function viewId($permalink){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE productPermalink='".$permalink."'";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                $idProduct = $r['idProduct'];
            }

            return $idProduct;
        }
    }
     public function cekRowViewId($permalink){
        //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE." WHERE productPermalink='".$permalink."'";
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows']; 
        
            return $numrows;
        }

    public function setVar(){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE idProduct=".$this->idProduct;
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                $this->idProduct = $r['idProduct'];
                $this->productPrice = $r['productPrice'];
                $this->productDescription = $r['productDescription'];
                $this->productName = $r['productName'];
                 $this->idArtist = $r['idArtist'];
                $this->productType = $r['productType'];
                $this->featured = $r['featured'];
                $this->productAuthor = $r['productAuthor'];
                $this->productDiscount = $r['productDiscount'];
                $this->productAvailability = $r['productAvailability'];
                 $this->productWeight = $r['productWeight'];
            }
        }
    }
     public function setVarCart(){
        $sql = "SELECT * FROM ".PRODUK_TABLE." WHERE idProduct=".$this->idProduct;
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                $this->idProduct = $r['idProduct'];
                $this->productPrice = $r['productPrice'];
                $this->productName = $r['productName'];
                $this->productWeight = $r['productWeight'];
            }
        }
    }
    
    public function setPageNumber($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
    	$query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE;
    	$result  = mysql_query($query) or die('Error, query failed');
    	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
    	$numrows = $row['numrows'];
    					
    	
    	//utk bikin link page number
    	$maxPage = ceil($numrows/$rowsPerPage);
    					
    	$self = $_SERVER['PHP_SELF'];
    	$nav  = '';
    	for($page = 1; $page <= $maxPage; $page++){
                if($page == $pageNum){
    		$nav .= "<span class=\"page-num\">$page</span>";
                }else{
    		$nav .= "<span class=\"page-num-linked\"><a href=\"page=$page\">$page</a></span> ";
                }
    	}
        return $nav;
    }
    public function setPageNumberPerCat($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE." WHERE productType=".$this->productType;
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
            $nav .= "<span class=\"page-num-linked\"><a href=\"page=$page\">$page</a></span> ";
                }
        }
        return $nav;
    }
    public function cekRows(){
        //query menghitung jumlah baris utk page number
    	$query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE;
    	$result  = mysql_query($query) or die('Error, query failed');
    	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
    	$numrows = $row['numrows'];	
    	
            return $numrows;
        }
        public function cekRowsPerCat(){
            //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE." WHERE productType=".$this->productType;
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows']; 
        
            return $numrows;
        }
        
        public function setPageNumberAdmin($pageNum, $rowsPerPage){
            //query menghitung jumlah baris utk page number
    	$query   = "SELECT COUNT(*) AS numrows FROM ".PRODUK_TABLE;
    	$result  = mysql_query($query) or die('Error, query failed');
    	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
    	$numrows = $row['numrows'];
    					
    	
    	//utk bikin link page number
    	$maxPage = ceil($numrows/$rowsPerPage);
    					
    	$self = $_SERVER['PHP_SELF'];
    	$nav  = '';
    	for($page = 1; $page <= $maxPage; $page++){
                if($page == $pageNum){
    		$nav .= "<span class=\"page-num\">$page</span>";
                }else{
    		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=product&&page=$page\">$page</a></span> ";
                }
    	}
        return $nav;
    }
    
    public function viewType(){
        $query   = "SELECT * FROM producttype WHERE idType='".$this->productType."'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$typeName =  $row['typeName'];
        return $typeName;
    }
    public function viewDropDown(){
         $sql = "SELECT * FROM producttype ORDER BY typeName ASC";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<option value=\"$r[idType]\">$r[typeName]</option>";
            }
        }
    }
    
    public function insertProduct(){
        if ( isset( $_FILES['picture'] ) ) {
                if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				
                    $arrayHasil = array();
                    $sql = "INSERT INTO ".PRODUK_TABLE."( idArtist,productPermalink, productName, productDescription, productType, productPrice, productAuthor, featured, productDiscount, productAvailability, productWeight) VALUES ('$this->idArtist','$this->productPermalink','$this->productName', '$this->productDescription', '$this->productType', '$this->productPrice', '$this->productAuthor', '$this->featured', '$this->productDiscount', '$this->productAvailability', '$this->productWeight')";
                    $hasil = mysql_query($sql);
                    if($hasil){			
                        mkdir("../../uploaded_images/product/".mysql_insert_id()."/", 0777);
                        $arrayHasil[0]= "<script>alert(\"Product Added!\");document.location = '../product.php?tab=product';</script>";
                        $arrayHasil[1]= mysql_insert_id();

                        return $arrayHasil;
                    }else{
                        $err=mysql_error();
                        $arrayHasil[0]= "<script>alert(\"Product Error! error code: $err\");document.location = '../product.php?tab=product';</script>";
                        $arrayHasil[1]= "Error";

                        return $arrayHasil;
                    }
				
		}else{
			echo "<script>alert(\"Upload Failed! No image selected/Forbidden Image Format!\");document.location = '../product.php';</script>";
		}
            }else{
                 echo "<script>alert(\"No image selected!\");document.location = '../product.php';</script>";
            }
    }
     public function updateProduct(){
        $sql = "UPDATE ".PRODUK_TABLE." SET idArtist='".$this->idArtist."',productName='".$this->productName."', productDescription='".$this->productDescription."', productType='".$this->productType."', productPrice='".$this->productPrice."', productAuthor='".$this->productAuthor."', productDiscount='".$this->productDiscount."', featured='".$this->featured."', productAvailability='".$this->productAvailability."', productWeight='".$this->productWeight."' WHERE idProduct = '".$this->idProduct."'";
	$runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }
    
     public function deleteProduct(){
        
       $sql2 = "DELETE FROM ".PRODUK_TABLE." WHERE idProduct='".$this->idProduct."'";
	$hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }
    public function deleteCat(){
        
       $sql2 = "DELETE FROM producttype WHERE idType='".$this->productType."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
    public function insertCat(){
      
                    $sql = "INSERT INTO producttype( typeName) VALUES ('$this->productTypeName')";
                    $hasil = mysql_query($sql);
                    if($hasil){         
                        return true;
                    }else{
                        return false;
                    }
                
       }
    
}
class category{
    public $idCategory;
    public $permalink;
    public $categoryName;

    public function setVar(){
        $sql = "SELECT * FROM producttype WHERE permalink='".$this->permalink."' ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $this->idCategory = $r['idType'];
            $this->categoryName = $r['typeName'];
       }
    }

    public function setVarFromId(){
        $sql = "SELECT * FROM producttype WHERE idType='".$this->idCategory."' ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $this->permalink = $r['permalink'];
            $this->categoryName = $r['typeName'];
       }
    }
}

class color{
    public $idColor;
    public $colorName;
    public $colorImage;

    public function setVar(){
        $sql = "SELECT * FROM productcolor WHERE idColor='".$this->idColor."' ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $this->colorName = $r['colorName'];
            $this->colorImage = $r['colorImage'];
       }
    }

    public function setVarFromId(){
        $sql = "SELECT * FROM productcolor WHERE idColor='".$this->idColor."' ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $this->colorName = $r['colorName'];
            $this->colorImage = $r['colorImage'];
       }
    }

     public function selectAll(){
        $sql = "SELECT * FROM productcolor ORDER BY colorName ASC ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new color();
            $obj->idColor = $r['idColor'];
            $obj->colorName = $r['colorName'];
            $obj->colorImage = $r['colorImage'];
          
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
}