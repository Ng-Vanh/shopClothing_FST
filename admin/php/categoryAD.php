<?php
include 'header.php';
include 'slider.php';
include '../Object/categoryObj.php'
?>

<?php
$category = new Category();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $categoryName = $_POST['category_name'];
    $insertCategory = $category->insertCategory($categoryName);
}
?>

<div class="col xl-9 admin__content-right">
                <h1>Them danh muc</h1>
                <form action="" method="POST">
                    <input name="category_name" type="text" placeholder="Nhap ten danh muc">
                    <button>Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>