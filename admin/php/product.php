<?php
include 'header.php';
include 'slider.php';
include '../Object/productObj.php';
?>

<?php

?>

<style>
    .product__info{

    }
    .product__info>h1{
        font-size: 24px;
    }
    .product__info>form{
        display: flex;
        flex-direction: column;
    }
    .product__info>form>input,select{
        width: 420px;
        height: 30px;
    }
    .product__info>form>textarea{
        width: 560px;
        font-size: 16px;
    }
    select,textarea{
        margin-left: 11px;
    }
    label{
        font-size: 18px;
        margin: 12px 0 12px 8px;
    }
    button{
        margin-top: 18px;
    }
</style>


<?php
$product = new Product();
$listCategory = $product->getListCategory();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['product_name'])){
        $insertProduct = $product->insertProduct($_POST,$_FILES);
    }
}

?>

    <div class="col xl-9 admin__content-right product__info">
                <h1>Thêm sản phẩm</h1>
                <form enctype="multipart/form-data" method="POST">
                    <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
                    <input required name="product_name" type="text" placeholder="Nhập tên sản phẩm">
                    <label for="">Nhập tên danh mục<span style="color: red;">*</span></label>
                    <select name="category_id" id="">
                        <option value="">---Chọn danh mục</option>

                        <?php 
                            if($listCategory){
                                while($cate = $listCategory->fetch_assoc()) {
                                    ?>
                                        <option value="<?php
                                        $curCateId = $cate['category_id'];
                                        echo $curCateId ?>"><?php echo $cate['category_name'] ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Nhập tên loại sản phẩm<span style="color: red;">*</span></label>
                    <select name="typeproduct_id" id="">
                        <option value="">---Chọn loại sản phẩm</option>
                        <?php 
                            $listTypeProd = $product->getListType($curCateId);
                            if($listTypeProd){
                                while($typeProd = $listTypeProd->fetch_assoc()){
                                    ?>
                                        <option value="<?php 
                                        $curTypeProdId = $typeProd['typeproduct_id'];
                                        echo $curTypeProdId
                                        ?>"><?php echo $typeProd['typeproduct_name'] ?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name ='price' required type="number" placeholder="Nhập giá sản phẩm">
                    <label for="">Giá khuyễn mãi<span style="color: red;">*</span></label>
                    <input name='priceDiscount' required type="number" placeholder="Nhập giá khuyễn mãi">
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea  name="productInfo" id="" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <input name='mainImgProduct' required type="file">
                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input multiple name="detailImgProduct[]" required  type="file" id="">
                    <button>Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>