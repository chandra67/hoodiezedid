<?php
/**
 * @author Taufik of PengrajinSitus.com
 */

class customer {
    public $idCustomer;
    public $customerEmail;
    public $customerPassword;
    public $customerName;
    public $customerPhone;
    public $customerAddress;
    public $customerImage;
    public $customerCity;
    
    public function cekEmail(){
        $sql = "SELECT customerEmail FROM customer";
	$runsql = mysql_query($sql);
        $exist = false;
	while($r=mysql_fetch_array($runsql)){
            if($this->customerEmail == $r['customerEmail']){ 
                    $exist = true;
            }else{
                    $exist = false;
            }
	}
        return $exist;		
    }

    public function registerUser($link){
        $sql = "INSERT INTO customer(customerEmail, customerPassword, customerName, customerPhone, customerAddress, customerImage, customerCity) VALUES ('$this->customerEmail', '$this->customerPassword', '$this->customerName', '$this->customerPhone', '$this->customerAddress', '$this->customerImage', '$this->customerCity')";
	$hasil = mysql_query($sql);
	if($hasil){			
            mkdir("customer/".mysql_insert_id()."/", 0777);
            mkdir("customer/".mysql_insert_id()."/profile/", 0777);
            echo "<script>document.location = '".$link."';</script>";
	}else{
            $err=mysql_error();
            echo "<script>alert(\"Registration Error! error code:$err\");document.location = 'signup.php';</script>"; 
	}
    }

        public function registerUserMobile($link){
        $sql = "INSERT INTO customer(customerEmail, customerPassword, customerName, customerPhone, customerAddress, customerImage, customerCity) VALUES ('$this->customerEmail', '$this->customerPassword', '$this->customerName', '$this->customerPhone', '$this->customerAddress', '$this->customerImage', '$this->customerCity')";
    $hasil = mysql_query($sql);
    if($hasil){         
            mkdir("../customer/".mysql_insert_id()."/", 0777);
            mkdir("../customer/".mysql_insert_id()."/profile/", 0777);
            echo "<script>document.location = '".$link."';</script>";
    }else{
            $err=mysql_error();
            echo "<script>alert(\"Registration Error! error code:$err\");document.location = 'signup.php';</script>"; 
    }
    }
    
    public function signIn() {
        $sql = "SELECT * FROM customer WHERE customerEmail='".$this->customerEmail."' AND customerPassword='".$this->customerPassword."'";
	$hasil = mysql_query($sql);
        $hasil2 = mysql_query($sql);
	if(mysql_num_rows($hasil) == 0){
            return false;
        }else{
            $r=mysql_fetch_array($hasil2);
            $_SESSION['idCustomer'] = $r['idCustomer'];
            $_SESSION['customerName'] = $r['customerName'];
            $_SESSION['customer_signed_in'] = true;
            return true;
        }
    }

    function signOut(){
        if($_SESSION['customer_signed_in'] == true){
            $_SESSION['idCustomer'] = NULL;
            $_SESSION['customerName'] = NULL;
            $_SESSION['customer_signed_in'] = NULL;
            echo "<script>document.location = 'signin.php';</script>";
        }
        else{
            echo "<script>alert(\"You are not logged in!\");document.location = 'signin.php';</script>";
        }
    }
    
    public function setVar(){
        $sql = "SELECT * FROM customer WHERE idCustomer='".$this->idCustomer."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        $this->customerName = $r['customerName'];
        $this->customerPhone = $r['customerPhone'];
        $this->customerAddress = $r['customerAddress'];
        $this->customerEmail = $r['customerEmail'];
        $this->customerImage = $r['customerImage'];
        $this->customerCity = $r['customerCity'];
    }
    
    public function viewImage() {
        if($this->customerImage == '#'){
            return "images/default-picture.jpg";
        }else{
            return "customer/".$this->idCustomer."/profile/".$this->customerImage; 
        }
    }
    
     
    
    public function viewCustomer($offset, $rowsPerPage){
        $sql = "SELECT * FROM customer ORDER BY customerName ASC LIMIT $offset, $rowsPerPage ";
	       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new customer();
            $obj->idCustomer = $r['idCustomer'];
            $obj->customerName = $r['customerName'];
            $obj->customerPhone = $r['customerPhone'];
            $obj->customerAddress = $r['customerAddress'];
            $obj->customerEmail = $r['customerEmail'];
            $obj->customerImage = $r['customerImage'];
            $obj->customerCity = $r['customerCity'];
            array_push($arrayObj, $obj);
	       }
        return $arrayObj;
    }

    public function viewAllCustomer(){
        $sql = "SELECT * FROM customer ORDER BY customerName ASC";
           $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new customer();
            $obj->customerName = $r['customerName'];
            $obj->customerEmail = $r['customerEmail'];
            array_push($arrayObj, $obj);
           }
        return $arrayObj;
    }
    
    
   
    public function setPageNumberAdmin($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM customer";
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
		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=customer&&page=$page\">$page</a></span> ";
            }
	}
        return $nav;
    }
    
    public function updatePicture(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
                                $extension=end(explode(".", $filename));
                                $newfilename="profile.".$extension;
				$target = "customer/".$this->idCustomer."/profile/".$newfilename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					echo "Error, move failed please try again later.";
				}else{ 
		
			
					$sql = "UPDATE customer SET customerImage ='$newfilename' WHERE idCustomer =".$this->idCustomer;	
				
					$hasil = mysql_query($sql);
					if($hasil){			
   						 echo "<script>alert(\"Picture Updated!\");document.location = 'account-setting.php';</script>";
					}else{
						echo "<script>alert(\"Update Failed! Database Error\");document.location = 'account-setting.php';</script>";
					}
				}
		}else{
			echo "<script>alert(\"Update Failed! No image selected/Forbidden Image Format!\");document.location = 'account-setting.php';</script>";
		}
            }else{
                 echo "<script>alert(\"No image selected!\");document.location = 'account-setting.php';</script>";
            }
    }

    public function updatePictureMobile(){
        if ( isset( $_FILES['picture'] ) ) {
            if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
                $source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
                                $extension=end(explode(".", $filename));
                                $newfilename="profile.".$extension;
                $target = "../customer/".$this->idCustomer."/profile/".$newfilename;
                
                $move = move_uploaded_file( $source, $target );
                if (!$move) { 
                    echo "Error, move failed please try again later.";
                }else{ 
        
            
                    $sql = "UPDATE customer SET customerImage ='$newfilename' WHERE idCustomer =".$this->idCustomer;    
                
                    $hasil = mysql_query($sql);
                    if($hasil){         
                         echo "<script>alert(\"Picture Updated!\");document.location = 'account-setting.php';</script>";
                    }else{
                        echo "<script>alert(\"Update Failed! Database Error\");document.location = 'account-setting.php';</script>";
                    }
                }
        }else{
            echo "<script>alert(\"Update Failed! No image selected/Forbidden Image Format!\");document.location = 'account-setting.php';</script>";
        }
            }else{
                 echo "<script>alert(\"No image selected!\");document.location = 'account-setting.php';</script>";
            }
    }
    
    public function updateUser() {
        $sql = "UPDATE customer SET customerName ='$_POST[customerName]', customerPhone ='$_POST[customerPhone]', customerAddress ='$_POST[customerAddress]', customerCity ='$_POST[customerCity]' WHERE idCustomer =".$this->idCustomer;	
	   $hasil = mysql_query($sql);
    	if($hasil){			
                return true;
            }else{
                return false;
    	}
    }
    public function updatePass() {
        $sql = "UPDATE customer SET customerPassword ='$_POST[new1]' WHERE idCustomer =".$this->idCustomer;	
    	$hasil = mysql_query($sql);
    	if($hasil){			
                return true;
            }else{
                return false;
    	}
    }
    public function cekOldPass() {
         $sql = "SELECT * FROM customer WHERE idCustomer='".$this->idCustomer."' AND customerPassword='$_POST[old]'";
	$hasil = mysql_query($sql);
	if(mysql_num_rows($hasil) == 0){
            return false;
        }else{
            return true;
        }
    }
    
    public function searchCustomer($searchWord){
        $sql = "SELECT * FROM customer WHERE customerName LIKE '%".$searchWord."%'  ORDER BY customerName ASC";
	   $runsql = mysql_query($sql);
       
        $query   = "SELECT COUNT(*) AS numrows FROM customer WHERE customerName LIKE '%".$searchWord."%'  ORDER BY customerName ASC";
    	$result  = mysql_query($query) or die('Error, query failed');
    	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
    	$numrows = $row['numrows'];
        
        $arrayObj = array();
        if($runsql === FALSE) {
            die(mysql_error());
        }
        if($numrows == 0){
            return $numrows;
        }else{
            while($r=mysql_fetch_array($runsql)){
               $obj = new customer();
                $obj->idCustomer = $r['idCustomer'];
                $obj->customerName = $r['customerName'];
                $obj->customerPhone = $r['customerPhone'];
                $obj->customerAddress = $r['customerAddress'];
                $obj->customerEmail = $r['customerEmail'];
                $obj->customerImage = $r['customerImage'];
                $obj->customerCity = $r['customerCity'];
                array_push($arrayObj, $obj);
            }
            return $arrayObj;
        }
    }

  
}
class city {
    public $idCity;
    public $cityName;
    public $cityShippingFee;

     public function viewCity(){
        $sql = "SELECT * FROM city ORDER BY cityName ASC";
           $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new customer();
            $obj->idCity = $r['idCity'];
            $obj->cityName = $r['cityName'];
            $obj->cityShippingFee = $r['cityShippingFee'];
            array_push($arrayObj, $obj);
           }
        return $arrayObj;
    }

     public function viewName(){
        $sql = "SELECT * FROM city WHERE idCity='".$this->idCity."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        return $r['cityName'];
    }
     public function updateFee() {
        $sql = "UPDATE city SET cityShippingFee ='".$this->cityShippingFee."' WHERE idCity =".$this->idCity; 
        $hasil = mysql_query($sql);
        if($hasil){         
                return true;
            }else{
                return false;
        }
    }

    public function setVar(){
        $sql = "SELECT * FROM city WHERE idCity='".$this->idCity."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        $this->idCity = $r['idCity'];
        $this->cityName = $r['cityName'];
        $this->cityShippingFee = $r['cityShippingFee'];
    }
}
