<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
define("IMAGE_TABLE","image");
define("IMAGE_SORT","idImage");

class image{
    public $idImage;
    public $imageUrl;
    public $imageDescription;
    public $imageName;
    public $imageType;
    public $imageHeaderId;
    public $imagePrimary;

    public function setVarImage($offset, $rowsPerPage, $sort){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."' ORDER BY ".IMAGE_SORT." $sort LIMIT $offset, $rowsPerPage ";
	$runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new image();
            $obj->idImage = $r['idImage'];
            $obj->imageDescription = $r['imageDescription'];
            $obj->imageName = $r['imageName'];
            $obj->imageUrl = $r['imageUrl'];
            $obj->imageType = $r['imageType'];
            $obj->imageHeaderId = $r['imageHeaderId'];
            $obj->imagePrimary = $r['imagePrimary'];
            array_push($arrayObj, $obj);
	   }
        return $arrayObj;
    }

     public function selectRandom($limit){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageType='artist' ORDER BY RAND() DESC LIMIT 0,$limit ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new image();
            $obj->idImage = $r['idImage'];
            $obj->imageDescription = $r['imageDescription'];
            $obj->imageName = $r['imageName'];
            $obj->imageUrl = $r['imageUrl'];
            $obj->imageType = $r['imageType'];
            $obj->imageHeaderId = $r['imageHeaderId'];
            $obj->imagePrimary = $r['imagePrimary'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }



    public function setVarImageAll(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."' ORDER BY ".IMAGE_SORT." ASC ";
	$runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new image();
            $obj->idImage = $r['idImage'];
            $obj->imageDescription = $r['imageDescription'];
            $obj->imageName = $r['imageName'];
            $obj->imageUrl = $r['imageUrl'];
            $obj->imageType = $r['imageType'];
            $obj->imageHeaderId = $r['imageHeaderId'];
            $obj->imagePrimary = $r['imagePrimary'];
            array_push($arrayObj, $obj);
	}
        return $arrayObj;
    }



    public function setVar(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE idImage='".$this->idImage."'";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->idImage = $r['idImage'];
                 $this->imageDescription = $r['imageDescription'];
                 $this->imageName = $r['imageName'];
                 $this->imageUrl = $r['imageUrl'];
                 $this->imageType = $r['imageType'];
                 $this->imageHeaderId = $r['imageHeaderId'];
                 $this->imagePrimary = $r['imagePrimary'];
            }
        }
    }

        public function setVarHover(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."' LIMIT 1";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->idImage = $r['idImage'];
                 $this->imageDescription = $r['imageDescription'];
                 $this->imageName = $r['imageName'];
                 $this->imageUrl = $r['imageUrl'];
                 $this->imageType = $r['imageType'];
                 $this->imageHeaderId = $r['imageHeaderId'];
                 $this->imagePrimary = $r['imagePrimary'];
            }
        }
    }

    public function setId(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."'";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->idImage = $r['idImage'];
            }
        }
    }
     public function viewPrimary(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageType='".$this->imageType."' AND imageHeaderId=".$this->imageHeaderId." AND imagePrimary = 'Yes'";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->imageUrl = $r['imageUrl'];
            }
            return $this->imageUrl;
        }
    }
    public function selectPrimary(){
        $sql = "SELECT * FROM ".IMAGE_TABLE." WHERE imageType='".$this->imageType."' AND imageHeaderId=".$this->imageHeaderId." AND imagePrimary = 'Yes'";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->imageUrl = $r['imageUrl'];
                 $this->idImage = $r['idImage'];
            }
        }
    }
    
    public function setPageNumber($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".IMAGE_TABLE;
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
		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?page=$page\">$page</a></span> ";
            }
	}
        return $nav;
    }
    public function cekRows(){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".IMAGE_TABLE;
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];	
	
        return $numrows;
    }

     public function cekHover(){
        //query menghitung jumlah baris utk page number
    $query   = "SELECT COUNT(*) AS numrows FROM image WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."'";
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }

    public function cekPrimary(){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".IMAGE_TABLE." WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."' AND imagePrimary = 'Yes'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];	
	
        return $numrows;
    }
    public function setPageNumberAdmin($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".IMAGE_TABLE;
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
    
    public function insertImages(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
				$target = "../../uploaded_images/".$this->imageType."/".$this->imageHeaderId."/".$filename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					echo "<script>alert(\"Move Failed! Database Error\");document.location = '../dashboard.php';</script>";
				}else{ 
					$sql = "INSERT INTO ".IMAGE_TABLE."( imageName, imageDescription, imageUrl, imageType, imageHeaderId, imagePrimary) VALUES ('$this->imageName', '$this->imageDescription', '$filename', '$this->imageType', '$this->imageHeaderId', '$this->imagePrimary')";
                                        $hasil = mysql_query($sql);
					if($hasil){			
                                            return true;
					}else{
                                            return false;
					}
				}
		}else{
			return false;
		}
            }else{
                 return false;
            }
    }
     public function updateImages(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
				$target = "../../uploaded_images/".$this->imageType."/".$this->imageHeaderId."/".$filename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					return false;
				}else{ 
					$sql = "UPDATE ".IMAGE_TABLE." SET imageName ='".$this->imageName."', imageDescription ='".$this->imageDescription."',  imageUrl ='".$filename."', imagePrimary='".$this->imagePrimary."' WHERE idImage ='".$this->idImage."' ";
                                        $hasil = mysql_query($sql);
					if($hasil){			
                                            return true;
					}else{
                                            return false;
					}
				}
		}else{
			return false;
		}
            }else{
                 return false;
            }
    }

    public function updateInfo(){
        $sql = "UPDATE ".IMAGE_TABLE." SET imageName ='".$this->imageName."', imageDescription ='".$this->imageDescription."' WHERE idImage ='".$this->idImage."' ";
                                        $hasil = mysql_query($sql);
                    if($hasil){         
                                            return true;
                    }else{
                                            return false;
                    }
    }

     public function removePrimary(){
        $sql = "UPDATE ".IMAGE_TABLE." SET imagePrimary='No' WHERE imageHeaderId='".$this->imageHeaderId."' AND imageType='".$this->imageType."'";
	$runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }
    
     public function deleteImages(){
        $this->setVar();
        unlink("../../uploaded_images/".$this->imageType."/".$this->imageHeaderId."/".$this->imageUrl);
        
        $sql2 = "DELETE FROM ".IMAGE_TABLE." WHERE idImage='".$this->idImage."'";
	$hasil2 = mysql_query($sql2);
         if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
    
    
}
