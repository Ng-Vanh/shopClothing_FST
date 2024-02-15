<?php
include 'header.php';
include 'slider.php';
// include '../Object/categoryObj.php';
include '../Object/categoryTypeProductObj.php';
?>

<style>
    select{
        height: 30px;
        width: 200px;
        color: var(--text-color);
        padding: 2px 2px 2px 8px;
    }

</style>

<?php
$categoryTypeProduct = new CategoryTypeProduct();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['category_id'], $_POST['categoryTypeProduct_name'])){
        $categoryId = $_POST['category_id'];
        $categoryTypeProductName = $_POST['categoryTypeProduct_name'];
        
        $insertTypeProduct = $categoryTypeProduct->insertTypeProduct($categoryId, $categoryTypeProductName);
        
        if($insertTypeProduct){
            echo   "Thêm loại sản phẩm thành công!";
        } else {
            echo  "Thêm loại sản phẩm thành công!";
        }
    } else {
        echo "Thiếu dữ liệu cần thiết!";
    }
}


$listCate = $categoryTypeProduct->showCategory();
?>

<div class="col xl-9 admin__content-right">
                <h1>Thêm loại sản phẩm</h1>
                <form action="" method="POST">
                    <select name="category_id" id="">
                        <option value="#">Chọn danh mục</option>
                        <?php
                        if($listCate){
                            while($res = $listCate->fetch_assoc()){
                            ?>
                                <option value="<?php echo $res['category_id'] ?>"> <?php echo $res['category_name'] ?> </option>
                            <?php              
                            }
                        }
                        ?>
                    </select>
                    <input name="categoryTypeProduct_name" type="text" placeholder="Nhập tên loại sản phẩm">
                    <button>Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>