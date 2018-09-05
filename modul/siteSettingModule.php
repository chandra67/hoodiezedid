
<?php
/**
 * @author Taufik of PengrajinSitus.com
 */

class setting{
    public $idSetting;
    public $settingDescription;
    
    public function selectSetting(){
        $sql = "SELECT * FROM setting WHERE idSetting='".$this->idSetting."' ";
	$runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                 $this->settingDescription = $r['settingDescription'];
            }
        }
    }
     public function updateSetting(){
        $sql = "UPDATE setting SET settingDescription='".$this->settingDescription."' WHERE idSetting = '".$this->idSetting."'";
	$runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }
    
    public function insertPictures(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png" || $_FILES['picture']['type'] == "PNG"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
				$target = "../../uploaded_images/setting/".$this->idSetting."/".$filename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
                                        echo "<script>alert(\"Error! move() failed\");</script>";
                                        return false;
				}else{ 
                                    $sql = "UPDATE setting SET settingDescription='".$filename."' WHERE idSetting = '".$this->idSetting."'";
                                    $hasil = mysql_query($sql);
                                    if($hasil){
                                        return true;
                                    }else{
                                        echo "<script>alert(\"Error! updatePictures() failed\");</script>";
                                        return false;
                                    }
				}
		}else{
			echo "<script>alert(\"Error! not jpg/png \");</script>";
                         return false;
		}
            }else{
                echo "<script>alert(\"Error! no image selected\");</script>";
                 return false;
            }
    }
    
}