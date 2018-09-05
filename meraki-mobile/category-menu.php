				<div class="menu">
                   <p>
<?php
	if($category=='all'){
?>
                     <a href="../../shop/all/" class="current" style="width:15%; margin-right: 5%;">All</a> 
<?php
    }else{
    	?>
    				<a href="../../shop/all/" style="width:15%;margin-right: 5%;">All</a> 
    	<?php
    }

    $productType = new product();
    $productTypeView = $productType->setVarProductType();
    for($i = 0; $i < count($productTypeView); $i++){
    	if($productTypeView[$i]->productType==$category){
?>
                    <a href="../../shop/<?php echo $productTypeView[$i]->productType."/"; ?>" class="current" style="width:25%;"><?php echo $productTypeView[$i]->productTypeName; ?></a>
<?php
    	}else{
?>
                    <a href="../../shop/<?php echo $productTypeView[$i]->productType."/"; ?>" style="width:25%;"><?php echo $productTypeView[$i]->productTypeName; ?></a>
<?php
    	}
    }
  ?>
    				</p>
                </div>