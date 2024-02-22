<?php
include 'header.php';
include 'slider.php';
include '../Object/productObj.php'
?>

<?php
$product = new Product();
$listProducts = $product->getListProducts();
?>
<style>
    th{
        text-align: center;
    }
    td {
        max-width: 32px; 
        overflow: hidden; 
        text-overflow: ellipsis; 
        white-space: nowrap; 
}

</style>
<div class="col xl-9 admin__content-right-list">
                <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th style="width: 75px;">Số TT</th>
                        <th style="width: 150px;">Mã sản phẩm</th>
                        <th style="width: 200px;">Tên sản phẩm</th>
                        <th style="width: 100px;">Giá gốc</th>
                        <th style="width: 100px;">SALE</th>
                        <th>Mô tả</th>
                        <th style="width: 100px;">Thao tác</th>
                    </tr>
                        <?php
                        if($listProducts){
                            $i = 0;
                            while($curProd = $listProducts->fetch_assoc()){
                                    $i++;
                                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $curProd['product_id'] ?></td>
                        <td><?php echo $curProd['product_name'] ?></td>
                        <td><?php echo $curProd['price'] ?></td>
                        <td><?php echo $curProd['price_discount'] ?></td>
                        <td><?php echo $curProd['product_info'] ?></td>
                        <td>
                            <a href="productEdit.php?product_id=<?php echo $curProd['product_id'] ?>">Sửa</a>
                            <a href="productRemove.php?product_id=<?php echo $curProd['product_id'] ?>">Xóa</a>
                        </td>


                    </tr>

                                <?php
                            }
                        }
                        ?>
                </table>
            </div>
</body>
</html>