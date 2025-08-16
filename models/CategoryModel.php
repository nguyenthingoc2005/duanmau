<?php
class CategoryModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function danhsach()
    {
        $sql = "SELECT * FROM `category`";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getOneCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function updateCategory($id, $name)
    {
        $sql = "UPDATE category SET cat_name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("name", $name, PDO::PARAM_INT);
        $stmt->bindValue("id", (int)$id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function checkProductId($id)
    {
        $sql = "SELECT * FROM product WHERE cate_id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->execute();
        return $data;
    }
    public function addCategory($cat_name)
    {
        $sql = "INSERT INTO `category`(`cat_name`) VALUES ('$cat_name')";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        return $data;
    }
}