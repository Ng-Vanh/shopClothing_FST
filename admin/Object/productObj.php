<?php
include '../base/database.php'
?>
<?php 
class Product{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function getListCategory(){
        $query = "select * from tbl_category order by category_id desc";
        $res = $this->db->select($query);
        return $res;
    }
    public function getListType($cateId){
        $query = "SELECT * FROM tbl_typeproduct ORDER BY typeproduct_id desc";
        $res = $this->db->select($query);
        return $res;
    }

    public function insertProduct($postData, $fileData){
        $productName = $postData['product_name'];
        $category_id = $postData['category_id'];
        $typeproduct_id = $postData['typeproduct_id'];
        $price = $postData['price'];
        $priceDiscount = $postData['priceDiscount'];
        $productInfo = $postData['productInfo'];
        
    
        //Kiểm tra xem phần tử 'mainImgProduct' có tồn tại không
        if(isset($fileData['mainImgProduct']) && $fileData['mainImgProduct']['size'] > 0) {
            $mainImgProduct = $fileData['mainImgProduct']['name'];
            if (!file_exists('uploads/')) {
                mkdir('uploads/');
            }
            move_uploaded_file($fileData['mainImgProduct']['tmp_name'],'uploads/'.$fileData['mainImgProduct']['name']);
        } else {
            $mainImgProduct = null;
        }
        
        $query = "INSERT INTO tbl_product 
        (product_name, category_id, typeproduct_id, price, price_discount, product_info, main_img_product)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("siidiss", $productName, $category_id, $typeproduct_id, $price, $priceDiscount, $productInfo, $mainImgProduct);
        $res = $stmt->execute();
        $stmt->close();
        return $res;
    }
    public function getListProducts(){
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        $res = $this->db->select($query);
        return $res;
    }
    public function removeProduct($proID){
        $query = "DELETE FROM tbl_product WHERE product_id = $proID";
        $res = $this->db->delete($query);
        return $res;
    }
    public function getProduct($oldID){
        $query = "SELECT * FROM tbl_product WHERE product_id = $oldID";
        $res = $this->db->select($query);
        return $res;
    }
    public function updateProduct($postData, $fileData){
        $productName = $postData['product_name'];
        $price = $postData['price'];
        $priceDiscount = $postData['priceDiscount'];
        $productInfo = $postData['productInfo'];
        
    
        //Kiểm tra xem phần tử 'mainImgProduct' có tồn tại không
        if(isset($fileData['mainImgProduct']) && $fileData['mainImgProduct']['size'] > 0) {
            $mainImgProduct = $fileData['mainImgProduct']['name'];
            if (!file_exists('uploads/')) {
                mkdir('uploads/');
            }
            move_uploaded_file($fileData['mainImgProduct']['tmp_name'],'uploads/'.$fileData['mainImgProduct']['name']);
        } else {
            $mainImgProduct = null;
        }

        $query = "UPDATE tbl_product SET product_name = ?, price = ?, price_discount = ?, product_info = ?, main_img_product = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("siiss", $productName,$price,$priceDiscount,$productInfo,$mainImgProduct);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            header('Location:productList.php');
            return true;
        }else{
            return false; 
        }
    }
    
}
?>