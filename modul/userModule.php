<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
define("TABLE_NAME","user");
define("TABLE_SORT","name");

class user {
    public $idUser;
    public $email;
    public $password;
    public $name;
    public $userCat;
    public $organization;
    public $age;
    public $steamName;
    public $userImage;
    public $testimonial;
    
    public function cekEmail(){
        $sql = "SELECT email FROM ".TABLE_NAME;
	$runsql = mysql_query($sql);
        $exist = false;
	while($r=mysql_fetch_array($runsql)){
            if($this->email == $r['email']){ 
                    $exist = true;
            }else{
                    $exist = false;
            }
	}
        return $exist;		
    }

    public function registerUser(){
        $sql = "INSERT INTO ".TABLE_NAME."(email, password, name, userCat, organization, age, userImage) VALUES ('$this->email', '$this->password', '$this->name', '$this->userCat', '$this->organization', '$this->age', '$this->userImage')";
	$hasil = mysql_query($sql);
	if($hasil){			
            mkdir("user/".mysql_insert_id()."/", 0777);
            mkdir("user/".mysql_insert_id()."/profile/", 0777);
            echo "<script>document.location = 'signin.php?reg=true';</script>";
	}else{
            $err=mysql_error();
            echo "<script>alert(\"Registration Error! error code:$err\");document.location = 'signup.php';</script>"; 
	}
    }
    
    public function signIn() {
        $sql = "SELECT * FROM ".TABLE_NAME." WHERE email='".$this->email."' AND password='".$this->password."'";
	$hasil = mysql_query($sql);
        $hasil2 = mysql_query($sql);
	if(mysql_num_rows($hasil) == 0){
            return false;
        }else{
            $r=mysql_fetch_array($hasil2);
            $_SESSION['idUser'] = $r['idUser'];
            $_SESSION['userCat'] = $r['userCat'];
            $_SESSION['signed_in'] = true;
            return true;
        }
    }
    public function signInAdmin() {
        $sql = "SELECT * FROM ".TABLE_NAME." WHERE userCat='admin' AND email='".$this->email."' AND password='".$this->password."'";
	$hasil = mysql_query($sql);
        $hasil2 = mysql_query($sql);
	if(mysql_num_rows($hasil) == 0){
            return false;
        }else{
            $r=mysql_fetch_array($hasil2);
            $_SESSION['idUser'] = $r['idUser'];
            $_SESSION['userCat'] = $r['userCat'];
            $_SESSION['signed_in'] = true;
            return true;
        }
    }
    
    public function setVar(){
        $sql = "SELECT * FROM ".TABLE_NAME." WHERE idUser='".$this->idUser."'";
        $hasil2 = mysql_query($sql);
        $r=mysql_fetch_array($hasil2);
        $this->name = $r['name'];
        $this->organization = $r['organization'];
        $this->steamName = $r['steamName'];
        $this->email = $r['email'];
        $this->userImage = $r['userImage'];
        $this->testimonial = $r['testimonial'];
    }
    
    public function setHeader(){
        echo "<header class=\"header-con\">
                    <div class=\"header\">
                        <img src=\"../images/2ndbite-small.png\" />
                        <li><a href=\"../signout.php\">Logout</a></li>
                        <li><a href=\"account-settings.php\">Account</a></li>
                        <li>Welcome ".$this->name."!</li>
                    </div>
                </header>";
    }
    public function setHeaderFront(){
        echo "<header class=\"header-con\">
                    <div class=\"header\">
                        <img src=\"images/2ndbite-small.png\" />
                        <li><a href=\"signout.php\">Logout</a></li>
                        <li><a href=\"user/account-settings.php\">Account</a></li>
                        <li>Welcome ".$this->name."!</li>
                    </div>
                </header>";
    }
    public function viewImage($image) {
        if($this->userImage == '#'){
            return "images/default-picture.png";
        }else{
            if($image){
                return $this->idUser."/profile/".$this->userImage;
            }else{
                return "user/".$this->idUser."/profile/".$this->userImage;
            }
            
        }
    }
    
     public function viewImageAdmin() {
        if($this->userImage == '#'){
            return "../images/default-picture.png";
        }else{
                return "../user/".$this->idUser."/profile/".$this->userImage;
            
        }
    }
    
    public function viewClient($offset, $rowsPerPage){
        $sql = "SELECT * FROM ".TABLE_NAME." WHERE userCat = 'client' ORDER BY ".TABLE_SORT." ASC LIMIT $offset, $rowsPerPage ";
	$runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new user();
            $obj->idUser = $r['idUser'];
            $obj->email = $r['email'];
            $obj->name = $r['name'];
            $obj->organization = $r['organization'];
            $obj->userImage = $r['userImage'];
            $obj->testimonial = $r['testimonial'];
            $obj->age = $r['age'];
            array_push($arrayObj, $obj);
	}
        return $arrayObj;
    }
    
    public function viewClientList(){
        echo "<div class=\"client-box\"><img src=\"crop.php?h=180&w=150&f=".$this->viewImage()."\" />";
        echo "<h3>".$this->name."</h3>";
        echo "<p>".$this->organization."</p>";
        echo "<p style=\"font-size: 18px;\"><i>\"".$this->testimonial."\"</i></p>";
        echo "</div>";
    }
    
    public function viewClientListAdmin(){
        echo "<div class=\"client-box\"><img src=\"crop.php?h=150&w=100&f=".$this->viewImageAdmin()."\" />";
        echo "<a href=\"client.php?tab=userDetail&&id=".$this->idUser."\" >View Detail</a>";
        echo "<h3>".$this->name."</h3>";
        
        echo "<p>".$this->organization."</p>";
        echo "<p style=\"font-size: 18px;\"><i>".$this->email."</i></p>";
        
    }
    
    public function setPageNumber($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME;
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
    public function setPageNumberAdmin($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME;
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
		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=clientList&&page=$page\">$page</a></span> ";
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
				$target = $this->idUser."/profile/".$newfilename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					echo "Error, move failed please try again later.";
				}else{ 
		
			
					$sql = "UPDATE ".TABLE_NAME." SET userImage ='$newfilename' WHERE idUser =".$this->idUser;	
				
					$hasil = mysql_query($sql);
					if($hasil){			
   						 echo "<script>alert(\"Picture Updated!\");document.location = 'account-settings.php';</script>";
					}else{
						echo "<script>alert(\"Update Failed! Database Error\");document.location = 'account-settings.php';</script>";
					}
				}
		}else{
			echo "<script>alert(\"Update Failed! No image selected/Forbidden Image Format!\");document.location = 'account-settings.php';</script>";
		}
            }else{
                 echo "<script>alert(\"No image selected!\");document.location = 'account-settings.php';</script>";
            }
    }
    
    public function updatePictureAdmin(){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
                                $extension=end(explode(".", $filename));
                                $newfilename="profile.".$extension;
				$target = "../user/".$this->idUser."/profile/".$newfilename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					echo "Error, move failed please try again later.";
				}else{ 
		
			
					$sql = "UPDATE ".TABLE_NAME." SET userImage ='$newfilename' WHERE idUser =".$this->idUser;	
				
					$hasil = mysql_query($sql);
					if($hasil){			
   						 echo "<script>alert(\"Picture Updated!\");document.location = 'account-settings.php';</script>";
					}else{
						echo "<script>alert(\"Update Failed! Database Error\");document.location = 'account-settings.php';</script>";
					}
				}
		}else{
			echo "<script>alert(\"Update Failed! No image selected/Forbidden Image Format!\");document.location = 'account-settings.php';</script>";
		}
            }else{
                 echo "<script>alert(\"No image selected!\");document.location = 'account-settings.php';</script>";
            }
    }
    
    public function updateUser() {
        $sql = "UPDATE ".TABLE_NAME." SET name ='$_POST[name]', email ='$_POST[email]', organization ='$_POST[organization]', steamName ='$_POST[steamName]', testimonial ='$_POST[testimonial]' WHERE idUser =".$this->idUser;	
	$hasil = mysql_query($sql);
	if($hasil){			
            echo "<script>alert(\"Account Updated!\");document.location = 'account-settings.php';</script>";
        }else{
            echo "<script>alert(\"Update Failed!\");document.location = 'account-settings.php';</script>";
	}
    }
    public function updatePass() {
        $sql = "UPDATE ".TABLE_NAME." SET password ='$_POST[new1]' WHERE idUser =".$this->idUser;	
	$hasil = mysql_query($sql);
	if($hasil){			
            echo "<script>alert(\"Passwors Updated!\");document.location = 'account-settings.php';</script>";
        }else{
            echo "<script>alert(\"Update Failed!\");document.location = 'account-settings.php';</script>";
	}
    }
    public function cekOldPass() {
         $sql = "SELECT * FROM ".TABLE_NAME." WHERE idUser='".$this->idUser."' AND password='$_POST[old]'";
	$hasil = mysql_query($sql);
	if(mysql_num_rows($hasil) == 0){
            return false;
        }else{
            return true;
        }
    }
    
    public function searchClient($searchWord){
        $sql = "SELECT * FROM ".TABLE_NAME." WHERE name LIKE '%".$searchWord."%' AND userCat='client' ORDER BY name ASC";
	$runsql = mysql_query($sql);
       
        $query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME." WHERE name LIKE '%".$searchWord."%' AND userCat='client' ORDER BY name ASC";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
        
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        if($numrows == 0){
            echo "<p><i>$numrows result</i></p><br><br>";
        }else{
            while($r=mysql_fetch_array($runsql)){
                $obj = new user();
                $obj->idUser = $r['idUser'];
                $obj->email = $r['email'];
                $obj->name = $r['name'];
                $obj->organization = $r['organization'];
                $obj->userImage = $r['userImage'];
                $obj->testimonial = $r['testimonial'];
                $obj->age = $r['age'];
                $obj->viewClientListAdmin();
                echo "</div>";
            }
        }
    }
}

