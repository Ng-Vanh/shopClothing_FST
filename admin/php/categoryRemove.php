<?php
include '../Object/categoryObj.php';

$category = new Category();
if(!isset($_GET['category_id']) || $_GET['category_id'] == NULL){
    echo "<script>window.location = 'categoryListAD.php'</script>";
}else{
   $cateId = $_GET['category_id']; 
}
$removeCate = $category->removeCategory($cateId);

?>