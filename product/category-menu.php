				<div class="menu" style="padding-top: 40px;">
                   <p>
<?php
	if($category=='all'){
?>
                     <a href="../shop/all-category" class="current">All</a> 
<?php
    }else{
    	?>
    				<a href="../shop/all-category">All</a> 
    	<?php
    }

    $productType = new product();
    $productTypeView = $productType->setVarProductType();
    for($i = 0; $i < count($productTypeView); $i++){
    	if($productTypeView[$i]->productTypePermalink==$category){
?>
                    <a href="../shop/<?php echo $productTypeView[$i]->productTypePermalink; ?>" class="current"><?php echo $productTypeView[$i]->productTypeName; ?></a>
<?php
    	}else{
?>
                    <a href="../shop/<?php echo $productTypeView[$i]->productTypePermalink; ?>"><?php echo $productTypeView[$i]->productTypeName; ?></a>
<?php
    	}
    }
  ?>
    				</p>
                </div>