<?php
include 'header.php';
include 'slider.php';
include '../Object/categoryObj.php'
?>

<?php
$category = new Category();

if(!isset($_GET['category_id']) || $_GET['category_id'] == NULL){
    echo "<script>window.location = 'categoryListAD.php'</script>";
}else{
    $category_id = $_GET['category_id'];
}
$getCategory = $category->getCategory($category_id);
if($getCategory){
    $res = $getCategory->fetch_assoc();
}
?>


<?php


// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//     $categoryName = $_POST['category_name'];
//     if($categoryName!==""){
//         $insertCategory = $category->insertCategory($categoryName);
//     }   
// }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $newCategoryName = $_POST['category_name'];
    if($newCategoryName!==""){
        $updateCategory = $category->updateCategory($newCategoryName,$category_id);
    }
}
?>

<div class="col xl-9 admin__content-right">
                <h1>Update danh mục</h1>
                <form action="" method="POST">
                    <input required name="category_name" type="text" 
                        placeholder="Nhập tên danh mục" value="<?php echo $res['category_name'] ?>">
                    <button>Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>