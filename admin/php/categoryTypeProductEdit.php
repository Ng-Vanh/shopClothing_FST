<?php
include 'header.php';
include 'slider.php';
include '../Object/categoryTypeProductObj.php'
?>

<?php
$categoryTypeProduct = new CategoryTypeProduct();

if(!isset($_GET['typeproduct_id']) || $_GET['typeproduct_id'] == NULL){
    echo "<script>window.location = 'categoryTypeProductList.php'</script>";
}else{
    $typeProductId = $_GET['typeproduct_id'];
}
$listCateProduct = $categoryTypeProduct->getTypeProduct($typeProductId);

if($listCateProduct){
    $res = $listCateProduct->fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newTypeProdName = $_POST['typeproduct_name'];
    if($newTypeProdName!== NULL){
        $categoryTypeProduct->updateTypeProduct($newTypeProdName,$typeProductId);
    }
}
?>


<?php

?>

<div class="col xl-9 admin__content-right">
                <h1>Update loại sản phẩm</h1>
                <form action="" method="POST">
                    <input readonly name="category_name" type="text" 
                         value="<?php echo $res['category_name'] ?>">
                    <input required name="typeproduct_name" type="text" 
                        placeholder="Nhập tên loại sản phẩm" value="<?php echo $res['typeproduct_name'] ?>">
                    <button>Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>