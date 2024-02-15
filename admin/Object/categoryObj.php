<?php
include '../base/database.php'
?>

<?php
class Category{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function insertCategory($categoryName){
        $checkQuery = "SELECT category_name FROM tbl_category WHERE category_name = ?";
        $checkStmt = $this->db->link->prepare($checkQuery);
        $checkStmt->bind_param("s", $categoryName);
        $checkStmt->execute();
        $checkStmt->store_result();
        
        if($checkStmt->num_rows > 0){
            return false;
        } else {
            $insertQuery = "INSERT INTO tbl_category (category_name) VALUES (?)";
            $insertStmt = $this->db->link->prepare($insertQuery);
            $insertStmt->bind_param("s", $categoryName);
            $insertStmt->execute();
    
            if ($insertStmt->affected_rows > 0) {
                header('Location:categoryListAD.php');
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function showCategory(){
        $query = "select * from tbl_category order by category_id desc";
        $res = $this->db->select($query);
        return $res;
    }
    public function getCategory($category_id){
        $query = "select * from tbl_category where category_id = '$category_id' ";
        $res = $this->db->select($query);
        return $res;
    }
    public function updateCategory($catName, $catId){
        $query = "UPDATE tbl_category SET category_name = ? WHERE category_id = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("si", $catName, $catId);
        $stmt->execute();
        header('Location:categoryListAD.php');
        if ($stmt->affected_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    public function removeCategory($cateId){
        $query = "DELETE FROM tbl_category WHERE category_id = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("i", $cateId);
        $stmt->execute();
        header('Location:categoryListAD.php');
        if ($stmt->affected_rows > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>