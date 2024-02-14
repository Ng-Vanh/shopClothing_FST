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
        $query = "insert into tbl_category(category_name) values ('$categoryName')";
        $res = $this->db->insert($query);
        return $res;
    }
}
?>