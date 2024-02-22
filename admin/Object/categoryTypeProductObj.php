<?php
include '../base/database.php'
?>
<?php 
class CategoryTypeProduct{
    private $db;

    public function __construct(){
        $this-> db = new Database();
    }
    public function showCategory(){
        $query = "select * from tbl_category order by category_id desc";
        $res = $this->db->select($query);
        return $res;
    }

    public function showTypeProduct(){
        $query = "SELECT * FROM `tbl_typeproduct` tt
                INNER JOIN `tbl_category` tc ON tt.category_id = tc.category_id
                ORDER BY tt.typeproduct_id;";
        $res = $this->db->select($query);
        return $res;
    }

    public function getTypeProduct($typeProductId){
        $query = "SELECT * FROM `tbl_typeproduct` tt
                INNER JOIN `tbl_category` tc ON tt.category_id = tc.category_id
                WHERE typeproduct_id = '$typeProductId' ";
        $res = $this->db->select($query);
        return $res;
    }
    public function insertTypeProduct($category_id, $typeProductName){
        $checkQuery = "SELECT typeproduct_name FROM tbl_typeproduct WHERE typeproduct_name = ? AND category_id = ?";
        $checkStmt = $this->db->link->prepare($checkQuery);
        $checkStmt->bind_param("si", $typeProductName,$category_id);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if($checkStmt->num_rows > 0){
            return false;
        } else {
            $insertQuery = "INSERT INTO tbl_typeproduct (category_id, typeproduct_name) VALUES (?, ?)";
            $insertStmt = $this->db->link->prepare($insertQuery);
            $insertStmt->bind_param("is", $category_id, $typeProductName);
            $insertStmt->execute();
    
            if ($insertStmt->affected_rows > 0) {
                return true; 
            } else {
                return false; 
            }
        }
    }

    public function removeTypeProduct($typeProdId){
        $query = "DELETE FROM tbl_typeproduct WHERE typeproduct_id = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("i",$typeProdId);
        $stmt->execute();


        
        if ($stmt->affected_rows > 0) {
            header('Location:categoryTypeProductList.php');
            return true; 
        } else {
            return false; 
        }
              
        
    }

    public function updateTypeProduct($typeProdName,$curId){
        $query = "UPDATE tbl_typeproduct SET typeproduct_name = ? WHERE typeproduct_id = ?";
        $statement = $this->db->link->prepare($query);
        $statement->bind_param("si",$typeProdName,$curId);
        $statement->execute();

        if($statement->affected_rows > 0){
            header('Location:categoryTypeProductList.php');
            return true;
        }else{
            return false; 
        }
    }

}
?>