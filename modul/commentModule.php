<?php
/**
 * @author Taufik of PengrajinSitus.com
 */
define("TABLE_NAME3","comment");
define("TABLE_SORT3","idComment");

class comment {
    public $commentText;
    public $commentAuthor;
    public $idComment;
    public $commentType;
    public $commentDate;
    public $commentHeaderId;
    public $commentEmail;
    
    public function addComment(){
        $sql = "INSERT INTO ".TABLE_NAME3."(commentHeaderId, commentAuthor, commentText, commentType, commentDate, commentEmail) VALUES ('$this->commentHeaderId', '$this->commentAuthor', '$this->commentText', '$this->commentType', NOW(), '$this->commentEmail')";
	$hasil = mysql_query($sql);
	if($hasil){			
            return true;
	}else{
            return false;
	}
    }
    
    public function viewCommentList(){
        $sql = "SELECT *, DATE_FORMAT(comment.commentDate,'%d %M %Y') AS commentDateView FROM ".TABLE_NAME3." WHERE commentHeaderId='".$this->commentHeaderId."' AND commentType='".$this->commentType."' ORDER BY ".TABLE_SORT3." ASC";
	$runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new comment();
             $obj->idComment = $r['idComment'];
            $obj->commentText = $r['commentText'];
            $obj->commentAuthor = $r['commentAuthor'];
            $obj->commentDate = $r['commentDateView'];
            array_push($arrayObj, $obj);
	}
        return $arrayObj;
    }
    
    public function viewCommentListAdmin($offset, $rowsPerPage){
        $sql = "SELECT *, DATE_FORMAT(comment.commentDate,'%d %M %Y') AS commentDateView FROM ".TABLE_NAME3." WHERE idUser='".$this->idUser."' ORDER BY idComment DESC LIMIT $offset, $rowsPerPage";
	$runsql = mysql_query($sql);
        
        $arrayObj = array();
        
        if($runsql === FALSE) {
            die(mysql_error());
        }
        while($r=mysql_fetch_array($runsql)){
            $obj = new comment();
            $obj->idUser = $r['idUser'];
            $obj->idConsult = $r['idConsult'];
            $obj->idComment = $r['idComment'];
            $obj->messages = $r['messages'];
            $obj->attachment = $r['attachment'];
            $obj->commentDate = $r['commentDateView'];
            array_push($arrayObj, $obj);
	}
        return $arrayObj;
    }
    
   public function addAttachment($user){
        if ( isset( $_FILES['picture'] ) ) {
			if ( $_FILES['picture']['type'] == "image/jpeg" || $_FILES['picture']['type'] == "image/png"  ) {
				$source = $_FILES['picture']['tmp_name'];
                                $filename = $_FILES['picture']['name'];
				$target = $user."/".$filename;
				
				$move = move_uploaded_file( $source, $target );
				if (!$move) { 
					$filename = "#";
                                        return $filename;
				}else{ 
                                        return $filename;
				}
		}
            }
    }
    public function setPageNumber($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME3." WHERE idConsult=".$this->idConsult;
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
		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?order=".$this->idConsult."&&page=$page\">$page</a></span> ";
            }
	}
        return $nav;
    }
    
    public function setPageNumberAdmin($pageNum, $rowsPerPage){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME3." WHERE idUser=".$this->idUser;
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
		$nav .= "<span class=\"page-num-linked\"><a href=\"$self?tab=userComment&&id=".$this->idUser."&&page=$page\">$page</a></span> ";
            }
	}
        return $nav;
    }
    public function countRow(){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT COUNT(*) AS numrows FROM ".TABLE_NAME3." WHERE commentHeaderId='".$this->commentHeaderId."' AND commentType='".$this->commentType."'";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$numrows = $row['numrows'];
					
	
        return $numrows;
    }
    public function lastComment(){
        //query menghitung jumlah baris utk page number
	$query   = "SELECT *, DATE_FORMAT(comment.commentDate,'%d %M %Y') AS commentDateView FROM ".TABLE_NAME3." WHERE idUser=".$this->idUser." ORDER BY idComment DESC LIMIT 1";
	$result  = mysql_query($query) or die('Error, query failed');
	$row	 = mysql_fetch_array($result, MYSQL_ASSOC);
	$this->commentDate = $row['commentDateView'];
    }
    public function deleteComment(){
        
       $sql2 = "DELETE FROM ".TABLE_NAME3." WHERE idComment='".$this->idComment."'";
	$hasil2 = mysql_query($sql2);
        if($hasil2) {
            return true;
        }else{
            return false;
        }
    }
}
