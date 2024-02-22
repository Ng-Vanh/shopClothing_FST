<?php
include 'header.php';
include 'slider.php';
include '../Object/categoryTypeProductObj.php'
?>

<?php
$categoryTypeProductObj = new CategoryTypeProduct();
$listTypeProd = $categoryTypeProductObj->showTypeProduct();
?>

<div class="col xl-9 admin__content-right-list">
                <h1>Danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID TypeProduct</th>
                        <th>Danh mục</th>
                        <th>Tên loại sản phẩm</th>
                        <th>Tùy biến</th>
                    </tr>
                    <?php 
                        if($listTypeProd){
                            $stt = 0;
                            while($arrTypeProd = $listTypeProd->fetch_assoc()){
                                $stt++;
                           
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $arrTypeProd['typeproduct_id'] ?></td>
                        <td><?php echo $arrTypeProd['category_name'] ?></td>
                        <td><?php echo $arrTypeProd['typeproduct_name'] ?></td>
                        <td><a href="categoryTypeProductEdit.php?typeproduct_id= <?php echo $arrTypeProd['typeproduct_id'] ?>">Sửa</a>
                            <a href="categoryTypeProductRemove.php?typeproduct_id= <?php echo $arrTypeProd['typeproduct_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php 
                         }
                        }
                    
                    ?>
                    
                </table>
            </div>
</body>
</html>