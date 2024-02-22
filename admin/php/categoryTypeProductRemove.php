<?php
include '../Object/categoryTypeProductObj.php';

$typeProduct = new CategoryTypeProduct();
if(!isset($_GET['typeproduct_id']) || $_GET['typeproduct_id'] == NULL){
    echo "<script>window.location = 'categoryListAD.php'</script>";
}else{
   $typeProductId = $_GET['typeproduct_id']; 
}
$removeTypeProduct = $typeProduct->removeTypeProduct($typeProductId);


?>