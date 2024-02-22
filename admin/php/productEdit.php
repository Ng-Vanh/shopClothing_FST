<?php
include 'header.php';
include 'slider.php';
include '../Object/productObj.php';

if(!isset($_GET['product_id'])|| $_GET['product_id'] == NULL){
    echo "<script>window.location = 'productList.php'</script>";
}else{
    $oldProdID = $_GET['product_id'];
}
$product = new Product;
$oldProduct =$product->getProduct($oldProdID)->fetch_assoc();


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
</style>

    <div class="col xl-9 admin__content-right product__info">
                <h1>Cập nhật sản phẩm</h1>
                <form enctype="multipart/form-data" method="POST">
                    <label for="">Sửa tên sản phẩm <span style="color:red;">*</span></label>
                    <input required name="product_name" type="text" value="<?php echo  $oldProduct['product_name']?>">
                    <label for="">Sửa giá sản phẩm<span style="color: red;">*</span></label>
                    <input name ='price' required type="number" placeholder="Nhập giá sản phẩm" value="<?php echo $oldProduct['price']?>">
                    <label for="">Sửa giá khuyễn mãi<span style="color: red;">*</span></label>
                    <input name='priceDiscount' required type="number" placeholder="Nhập giá khuyễn mãi" value="<?php echo $oldProduct['price_discount']?>">
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea  name="productInfo" id="" cols="30" rows="10" ><?php echo $oldProduct['product_info'] ?></textarea>
                    <label for="">Chọn ảnh sản phẩm thay thế<span style="color: red;">*</span></label>
                    <input name='mainImgProduct' required type="file" value="<?php $oldProduct['main_img_product'] ?>">

                    <button>Update</button>
                </form>
            </div>
        </div>
    </div>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['product_name'])){
        $insertProduct = $product->updateProduct($_POST,$_FILES);
    }
}
?>