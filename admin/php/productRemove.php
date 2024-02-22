<?php
include '../Object/productObj.php';

$product = new Product();
if(!isset($_GET['product_id']) || $_GET['product_id'] == NULL){
    echo "<script>window.location = 'productList.php'</script>";
}else{
    $productID = $_GET['product_id'];
    $product->removeProduct($productID);
    header('Location: productList.php');
}

?>