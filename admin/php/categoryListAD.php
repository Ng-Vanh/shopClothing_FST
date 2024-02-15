<?php
include 'header.php';
include 'slider.php';
include '../Object/categoryObj.php'
?>

<?php
$category = new Category();
$showCategory = $category->showCategory();
?>

<div class="col xl-9 admin__content-right-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php 
                    if($showCategory){
                        $i = 0;
                        while($res = $showCategory->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $res['category_id'] ?></td>
                        <td><?php echo $res['category_name'] ?></td>
                        <td><a href="categoryEdit.php?category_id= <?php echo $res['category_id'] ?>">Sửa</a><a href="categoryRemove.php?category_id= <?php echo $res['category_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                    
                </table>
            </div>
</body>
</html>