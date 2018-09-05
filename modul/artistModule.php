<?php
/**
 * @author Taufik of PengrajinSitus.com
 */

class artist{
    public $idArtist;
    public $artistName;
    public $artistAge;
    public $artistFocus;
    public $artistGender;
    public $artistAbout;
    public $artistCity;
    public $artistPicture;
    public $artistVideo;

     public function setVarArtist($offset, $rowsPerPage){
        $sql = "SELECT * FROM artist ORDER BY idArtist DESC LIMIT $offset, $rowsPerPage ";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
           $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            $obj->artistVideo = $r['artistVideo'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

     public function searchArtist($searchWord){
        $sql = "SELECT * FROM artist WHERE artistName LIKE '%".$searchWord."%' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
           $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            $obj->artistVideo = $r['artistVideo'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

     public function selectAllArtist(){
        $sql = "SELECT * FROM artist ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
           $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

   public function selectAE(){
        $sql = "SELECT * FROM artist WHERE artistName REGEXP '^[A-E].*$' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function selectFJ(){
        $sql = "SELECT * FROM artist WHERE artistName REGEXP '^[F-J].*$' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
     public function selectKO(){
        $sql = "SELECT * FROM artist WHERE artistName REGEXP '^[K-O].*$' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }
    public function selectPT(){
        $sql = "SELECT * FROM artist WHERE artistName REGEXP '^[P-T].*$' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

    public function selectUZ(){
        $sql = "SELECT * FROM artist WHERE artistName REGEXP '^[U-Z].*$' ORDER BY artistName ASC";
       $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new artist();
            $obj->idArtist = $r['idArtist'];
            $obj->artistName = $r['artistName'];
            $obj->artistAge = $r['artistAge'];
            $obj->artistFocus = $r['artistFocus'];
            $obj->artistGender = $r['artistGender'];
            $obj->artistAbout = $r['artistAbout'];
            $obj->artistCity = $r['artistCity'];
            $obj->artistPicture = $r['artistPicture'];
            array_push($arrayObj, $obj);
       }
        return $arrayObj;
    }

    public function setVar(){
        $sql = "SELECT * FROM artist WHERE idArtist=".$this->idArtist;
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                $this->idArtist = $r['idArtist'];
                $this->artistName = $r['artistName'];
                $this->artistAge = $r['artistAge'];
                $this->artistFocus = $r['artistFocus'];
                $this->artistGender = $r['artistGender'];
                $this->artistAbout = $r['artistAbout'];
                $this->artistCity = $r['artistCity'];
                $this->artistPicture = $r['artistPicture'];
                $this->artistVideo = $r['artistVideo'];
            }
        }
    }

    public function viewArtistName(){
        $sql = "SELECT * FROM artist WHERE idArtist=".$this->idArtist;
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                return $r['artistName'];
            }
        }
    }
    
    public function cekRows(){
        //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM artist";
        $result  = mysql_query($query) or die('Error, query failed');
        $row     = mysql_fetch_array($result, MYSQL_ASSOC);
        $numrows = $row['numrows']; 
        
            return $numrows;
        }
    
        
        public function setPageNumberAdmin($pageNum, $rowsPerPage){
            //query menghitung jumlah baris utk page number
        $query   = "SELECT COUNT(*) AS numrows FROM artist";
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
            $nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=artist&&page=$page\">$page</a></span> ";
                }
        }
        return $nav;
    }
    
   
    
    public function insertArtist(){
        if ( isset( $_FILES['picture'] ) ) {
                if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
                
                    $arrayHasil = array();
                    $sql = "INSERT INTO artist( artistName, artistAge, artistCity, artistGender, artistFocus, artistAbout, artistVideo) VALUES ('$this->artistName', '$this->artistAge', '$this->artistCity', '$this->artistGender', '$this->artistFocus', '$this->artistAbout', '$this->artistVideo')";
                    $hasil = mysql_query($sql);
                    if($hasil){ 
                        $newid = mysql_insert_id();     
                        mkdir("../../uploaded_images/artist/".$newid."/", 0777);
                        $source = $_FILES['picture']['tmp_name'];
                        $filename = $_FILES['picture']['name'];
                        $target = "../../uploaded_images/artist/".$newid."/".$filename;
                        
                        $move = move_uploaded_file( $source, $target );
                        if (!$move) { 
                            echo "<script>alert(\"Error! Upload image failed.\");document.location = '../artist.php?tab=artist';</script>";
                        }else{ 
                            $sql2 = "UPDATE artist SET artistPicture ='$filename' WHERE idArtist =".$newid;  
                
                            $hasil2 = mysql_query($sql2);
                            if($hasil2){   
                                echo "<script>alert(\"Artist Added!\");document.location = '../artist.php?tab=artist';</script>";
                            }else{
                                echo "<script>alert(\"Error! error code: $err\");document.location = '../artist.php?tab=artist';</script>";
                            }    
                        }
                    }else{
                        echo "<script>alert(\"Error! error code: $err\");document.location = '../artist.php?tab=artist';</script>";
                    }
                
            }else{
                echo "<script>alert(\"Upload Failed! No image selected/Forbidden Image Format!\");document.location = '../artist.php';</script>";
            }
        }else{
            echo "<script>alert(\"No image selected!\");document.location = '../artist.php';</script>";
        }
    }
     public function updateArtist(){
        $sql = "UPDATE artist SET artistName='".$this->artistName."', artistAge='".$this->artistAge."', artistAge='".$this->artistAge."', artistCity='".$this->artistCity."', artistGender='".$this->artistGender."', artistFocus='".$this->artistFocus."', artistAbout='".$this->artistAbout."', artistVideo='".$this->artistVideo."'  WHERE idArtist = '".$this->idArtist."'";
    $runsql = mysql_query($sql);
        if($runsql) {
            return true;
        }else{
            return false;
        }
    }
    
     public function deleteArtist(){
        
       $sql2 = "DELETE FROM artist WHERE idArtist='".$this->idArtist."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
       
    }

    public function updatePicture(){
        if ( isset( $_FILES['picture'] ) ) {
            if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
                        $source = $_FILES['picture']['tmp_name'];
                        $filename = $_FILES['picture']['name'];
                        $target = "../../uploaded_images/artist/".$this->idArtist."/".$filename;
                        $move = move_uploaded_file( $source, $target );
                        if (!$move) { 
                            echo "<script>alert(\"Error! Upload image failed.\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$this->idArtist."';</script>";
                        }else{ 
                            $sql2 = "UPDATE artist SET artistPicture ='$filename' WHERE idArtist =".$this->idArtist;  
                
                            $hasil2 = mysql_query($sql2);
                            if($hasil2){   
                                echo "<script>alert(\"Picture Updated!\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$this->idArtist."';</script>";
                            }else{
                                echo "<script>alert(\"Error! error code: $err\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$this->idArtist."';</script>";
                            }    
                        }
            }else{
                echo "<script>alert(\"Upload Failed! No image selected/Forbidden Image Format!\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$this->idArtist."'';</script>";
            }
        }else{
            echo "<script>alert(\"No image selected!\");document.location = '../artist.php?tab=artist&&edit=yes&&productno=".$this->idArtist."';</script>";
        }
    }
}
