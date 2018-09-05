<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
define("NEWS_TABLE","news");
define("NEWS_SORT","idNews");

class news{
    
    public $idNews;
    public $newsTitle;
    public $newsDescription;
    public $newsDate;
    public $newsImage;
    public $newsAuthor;
    public $newsCategory;
    public $newsView;
    public $newsMetaKeyword;
    public $newsMetaDescription;


     public $idCategory;
    public $categoryName;

    public function setVarNews($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%M, %D %Y') AS tglView FROM ".NEWS_TABLE." WHERE newsCategory = ".$this->idCategory." ORDER BY ".NEWS_SORT." DESC LIMIT $offset, $rowsPerPage ";
    $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
            $obj->idNews = $r['idNews'];
            $obj->newsTitle = $r['newsTitle'];
            $obj->newsDescription = $r['newsDescription'];
            $obj->newsDate = $r['tglView'];
            $obj->newsImage = $r['newsImage'];
            $obj->newsAuthor = $r['newsAuthor'];
            $obj->newsCategory = $r['newsCategory'];
            $obj->idCategory = $r['newsCategory'];
            $obj->newsView = $r['newsView'];
            $obj->newsMetaKeyword = $r['newsMetaKeyword'];
            $obj->newsMetaDescription = $r['newsMetaDescription'];
            array_push($arrayObj, $obj);
    }
        return $arrayObj;
    }

public function setVarNewsAdmin($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%M, %D %Y') AS tglView FROM ".NEWS_TABLE."  ORDER BY ".NEWS_SORT." DESC LIMIT $offset, $rowsPerPage ";
    $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
            $obj->idNews = $r['idNews'];
            $obj->newsTitle = $r['newsTitle'];
            $obj->newsDescription = $r['newsDescription'];
            $obj->newsDate = $r['tglView'];
            $obj->newsImage = $r['newsImage'];
            $obj->newsAuthor = $r['newsAuthor'];
            $obj->newsCategory = $r['newsCategory'];
            $obj->idCategory = $r['newsCategory'];
            $obj->newsView = $r['newsView'];
            $obj->newsMetaKeyword = $r['newsMetaKeyword'];
            $obj->newsMetaDescription = $r['newsMetaDescription'];
            array_push($arrayObj, $obj);
    }
        return $arrayObj;
    }

     public function cekRows(){
        //query menghitung jumlah baris utk page number
    $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE;
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }

    public function cekRowsPerCat(){
        //query menghitung jumlah baris utk page number
    $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE." WHERE newsCategory =".$this->idCategory;
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }

    public function setVar(){
        $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE." WHERE idNews=".$this->idNews;
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        if($numrows==0){
            echo "<p>404 not found!</p>";
        }
        
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%M, %D %Y') AS tglView FROM ".NEWS_TABLE." WHERE idNews = ".$this->idNews;
    $runsql = mysql_query($sql);
        
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $this->newsTitle = $r['newsTitle'];
            $this->newsDescription = $r['newsDescription'];
            $this->newsDate = $r['tglView'];
            $this->newsImage = $r['newsImage'];
            $this->newsAuthor = $r['newsAuthor'];
            $this->newsCategory = $r['newsCategory'];
            $this->idCategory = $r['newsCategory'];
            $this->newsView = $r['newsView'];
             $this->newsMetaKeyword = $r['newsMetaKeyword'];
            $this->newsMetaDescription = $r['newsMetaDescription'];
    }
    }
    
    public function setPageNumber($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
    $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE;
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
        $nav .= "<span class=\"page-num-linked\"><a href=\"$self?page=$page\">$page</a></span> ";
            }
    }
        return $nav;
    }
    
    public function setPageNumberAdmin($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
    $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE;
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows'];
                    
    
    //utk bikin link page number
    $maxPage = ceil($numrows/$rowsPerPage);
                    
    $self = $_SERVER['PHP_SELF'];
    $nav  = '';
    for($page = 1; $page <= $maxPage; $page++){
           if($page == $pageNum){
        $nav .= "<span class=\"page-num-black\">$page</span>";
            }else{
        $nav .= "<span class=\"page-num-linked-black\"><a href=\"$self?tab=news&&page=$page\">$page</a></span> ";
            }
    }
        return $nav;
    }
    
    
    public function updateNews($image){
        if($image){
            $idnews = $this->idNews;
            if($this->insertNewsPictures($idnews)){
                $sql = "UPDATE ".NEWS_TABLE." SET newsTitle='".$this->newsTitle."', newsDescription='".$this->newsDescription."', newsCategory='".$this->newsCategory."',  newsAuthor='".$this->newsAuthor."', newsMetaKeyword='".$this->newsMetaKeyword."', newsMetaDescription='".$this->newsMetaDescription."' WHERE idNews = '".$this->idNews."'";
                $runsql = mysql_query($sql);
                if($runsql) {
                    return true;
                }else{
                    return false;
                }
            }
        }else{
             $sql = "UPDATE ".NEWS_TABLE." SET newsTitle='".$this->newsTitle."', newsDescription='".$this->newsDescription."',newsCategory='".$this->newsCategory."', newsAuthor='".$this->newsAuthor."', newsMetaKeyword='".$this->newsMetaKeyword."', newsMetaDescription='".$this->newsMetaDescription."' WHERE idNews = '".$this->idNews."'";
            $runsql = mysql_query($sql);
            if($runsql) {
                return true;
            }else{
                return false;
            }
        }
       
    }
     public function updateView(){
         $this->newsView += 1;
                $sql = "UPDATE ".NEWS_TABLE." SET newsView='".$this->newsView."' WHERE idNews = '".$this->idNews."'";
                $runsql = mysql_query($sql);
    }
    public function deleteNews(){
        $this->setVar();
        unlink("../../uloaded_images/news/".$this->idNews."/".$this->newsImage);
        
       $sql2 = "DELETE FROM ".NEWS_TABLE." WHERE idNews='".$this->idNews."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
    public function deleteCategory(){
        
       $sql2 = "DELETE FROM newscategory WHERE idCategory='".$this->newsCategory."'";
    $hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
    
    public function insertNews(){
    $sql = "INSERT INTO ".NEWS_TABLE."( newsTitle, newsDescription, newsAuthor, newsDate, newsCategory, newsMetaKeyword, newsMetaDescription) VALUES ('$this->newsTitle', '$this->newsDescription', '$this->newsAuthor', NOW(), '$this->newsCategory', '$this->newsMetaKeyword', '$this->newsMetaDescription')";
        $hasil = mysql_query($sql);
        if($hasil){
            $idnews = mysql_insert_id();
            mkdir("../../uploaded_images/news/".$idnews."/", 0777);
            if($this->insertNewsPictures($idnews)){
                echo "<script>alert(\"News published!\");document.location = '../news.php';</script>";
            }else{
                echo "<script>alert(\"Error, addPicture() failed!\");document.location = '../news.php';</script>";
            }
    }else{
            echo "<script>alert(\"Error! addArticle() failed\");document.location = '../news.php';</script>";
    }
        
    }
    
    public function insertCategory(){
    $sql = "INSERT INTO newscategory ( categoryName) VALUES ('$this->newsCategory')";
        $hasil = mysql_query($sql);
        if($hasil){
                echo "<script>alert(\"Category added!\");document.location = '../news.php?tab=addnew&&category=yes';</script>";
    }else{
            echo "<script>alert(\"Error! addCategory() failed\");document.location = '../news.php?tab=addnew&&category=yes';</script>";
    }
        
    }
    public function insertNewsPictures($idnews){
        if ( isset( $_FILES['picture'] ) ) {
            if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png" || $_FILES['picture']['type'] == "PNG" || $_FILES['picture']['type'] == "JPG"  ) {
                $source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
                $target = "../../uploaded_images/news/".$idnews."/".$filename;
                
                $move = move_uploaded_file( $source, $target );
                if (!$move) { 
                                        echo "<script>alert(\"Error! move() failed\");document.location = '../news.php';</script>";
                                        return false;
                }else{ 
                                    $sql = "UPDATE ".NEWS_TABLE." SET newsImage='".$filename."' WHERE idNews = '".$idnews."'";
                                    $hasil = mysql_query($sql);
                                    if($hasil){
                                        return true;
                                    }else{
                                        echo "<script>alert(\"Error! updatePictures() failed\");document.location = '../news.php';</script>";
                                        return false;
                                    }
                }
        }else{
            echo "<script>alert(\"Error! not jpg/png \");document.location = '../news.php';</script>";
                         return false;
        }
            }else{
                echo "<script>alert(\"Error! no image selected\");document.location = '../news.php';</script>";
                 return false;
            }
    }
    public function insertNewsPictures2($idnews){
        if ( isset( $_FILES['picture'] ) ) {
            if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png" || $_FILES['picture']['type'] == "PNG" || $_FILES['picture']['type'] == "JPG"  ) {
                $source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
                $target = "../../uploaded_images/news/".$idnews."/".$filename;
                
                $move = move_uploaded_file( $source, $target );
                if (!$move) { 
                                        echo "<script>alert(\"Error! move() failed\");document.location = '../news.php';</script>";
                                        return false;
                }else{ 
                                    $sql = "UPDATE ".NEWS_TABLE." SET newsImage='".$filename."' WHERE idNews = '".$idnews."'";
                                    $hasil = mysql_query($sql);
                                    if($hasil){
                                        return true;
                                    }else{
                                        echo "<script>alert(\"Error! updatePictures() failed\");document.location = '../news.php';</script>";
                                        return false;
                                    }
                }
        }else{
            echo "<script>alert(\"Error! not jpg/png \");document.location = '../news.php';</script>";
                         return false;
        }
            }else{
                echo "<script>alert(\"Error! no image selected\");document.location = '../news.php';</script>";
                 return false;
            }
    }
     public function viewDropDown(){
         $sql = "SELECT * FROM newscategory ORDER BY categoryName ASC";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<option value=\"$r[idCategory]\">$r[categoryName]</option>";
            }
        }
    }
    public function viewCategoryLink(){
         $sql = "SELECT * FROM newscategory ORDER BY idCategory ASC";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<p><a href=\"search.php?search=category&&categoryno=$r[idCategory]&&categoryname=$r[categoryName]\">$r[categoryName]</a></p>";
            }
        }
    }
    public function viewCategoryLinkUp(){
         $sql = "SELECT * FROM newscategory ORDER BY categoryName ASC";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<p><a href=\"../../search.php?search=category&&categoryno=$r[idCategory]&&categoryname=$r[categoryName]\">$r[categoryName]</a></p>";
            }
        }
    }
      public function viewArchiveLink(){
         $sql = "SELECT COUNT(*) AS jumlah, DATE_FORMAT(news.newsDate,'%M %Y') AS tglView, DATE_FORMAT(news.newsDate,'%Y-%m') AS tglSubmit FROM news GROUP BY DATE_FORMAT(news.newsDate,'%Y-%m')";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<p><a href=\"search.php?search=archive&&tgl=$r[tglSubmit]&&tglview=$r[tglView]\">$r[tglView] ($r[jumlah])</a></p>";
            }
        }
    }
    public function viewCategoryList(){
         $sql = "SELECT * FROM newscategory ORDER BY idCategory ASC";
        $runsql = mysql_query($sql);
        
       $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
            $obj->idCategory = $r['idCategory'];
            $obj->categoryName = $r['categoryName'];
            array_push($arrayObj, $obj);
        }
        return $arrayObj;
    }
    public function viewArchiveLinkUp(){
         $sql = "SELECT COUNT(*) AS jumlah, DATE_FORMAT(news.newsDate,'%M %Y') AS tglView, DATE_FORMAT(news.newsDate,'%Y-%m') AS tglSubmit FROM news GROUP BY DATE_FORMAT(news.newsDate,'%Y-%m')";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                echo "<p><a href=\"../../search.php?search=archive&&tgl=$r[tglSubmit]&&tglview=$r[tglView]\">$r[tglView] ($r[jumlah])</a></p>";
            }
        }
    }
    
    public function viewCategoryName(){
         $sql = "SELECT * FROM newscategory WHERE idCategory = '$this->idCategory'";
    $runsql = mysql_query($sql);
        
        if($runsql === FALSE) {
            die(mysql_error());
        }else{
            while($r=mysql_fetch_array($runsql)){
                return $r['categoryName'];
            }
        }
    }
    
    public function searchNewsTitleCount($word){
        $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE." WHERE newsTitle LIKE '%$word%'";
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }
    public function searchNewsTitle($word){
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%d %M %Y %h:%i %p') AS tglView FROM ".NEWS_TABLE." WHERE newsTitle LIKE '%$word%' ORDER BY idNews DESC";
    $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
           $obj->idNews = $r['idNews'];
            $obj->newsTitle = $r['newsTitle'];
            $obj->newsDescription = $r['newsDescription'];
            $obj->newsDate = $r['tglView'];
            $obj->newsImage = $r['newsImage'];
            $obj->newsAuthor = $r['newsAuthor'];
            $obj->newsCategory = $r['newsCategory'];
            $obj->newsView = $r['newsView'];
            array_push($arrayObj, $obj);
    }
        return $arrayObj;
    }
    public function searchCategoryCount(){
        $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE." WHERE newsCategory = '$this->newsCategory'";
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }
    public function searchCategory(){
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%d %M %Y %h:%i %p') AS tglView FROM ".NEWS_TABLE." WHERE newsCategory = '$this->newsCategory' ORDER BY idNews DESC";
    $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
           $obj->idNews = $r['idNews'];
            $obj->newsTitle = $r['newsTitle'];
            $obj->newsDescription = $r['newsDescription'];
            $obj->newsDate = $r['tglView'];
            $obj->newsImage = $r['newsImage'];
            $obj->newsAuthor = $r['newsAuthor'];
            $obj->newsCategory = $r['newsCategory'];
            $obj->newsView = $r['newsView'];
            array_push($arrayObj, $obj);
    }
        return $arrayObj;
    }
    public function searchArchiveCount($month){
        $query   = "SELECT COUNT(*) AS numrows FROM ".NEWS_TABLE." WHERE newsDate LIKE '%$month%'";
    $result  = mysql_query($query) or die('Error, query failed');
    $row     = mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows = $row['numrows']; 
    
        return $numrows;
    }
    public function searchArchive($month){
        $sql = "SELECT *, DATE_FORMAT(news.newsDate,'%d %M %Y %h:%i %p') AS tglView FROM ".NEWS_TABLE." WHERE newsDate LIKE '%$month%' ORDER BY idNews DESC";
    $runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new news();
           $obj->idNews = $r['idNews'];
            $obj->newsTitle = $r['newsTitle'];
            $obj->newsDescription = $r['newsDescription'];
            $obj->newsDate = $r['tglView'];
            $obj->newsImage = $r['newsImage'];
            $obj->newsAuthor = $r['newsAuthor'];
            $obj->newsCategory = $r['newsCategory'];
            $obj->newsView = $r['newsView'];
            array_push($arrayObj, $obj);
    }
        return $arrayObj;
    }
}
