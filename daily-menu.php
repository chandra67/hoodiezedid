				<div class="menu-daily">
                   <p>
    	<?php
    

    $newsType = new news();
    $newsTypeView = $newsType->viewCategoryList();
    for($i = 0; $i < count($newsTypeView); $i++){
    	if($newsTypeView[$i]->idCategory==$category){
?>
                    <a href="../../daily/<?php echo $newsTypeView[$i]->idCategory."/".$newsTypeView[$i]->categoryName; ?>" class="current"><?php echo $newsTypeView[$i]->categoryName; ?></a>
<?php
    	}else{
?>
                    <a href="../../daily/<?php echo $newsTypeView[$i]->idCategory."/".$newsTypeView[$i]->categoryName; ?>"><?php echo $newsTypeView[$i]->categoryName; ?></a>
<?php
    	}
    }
  ?>
    				</p>
                </div>