<?php 

class ProductMdodel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB() ;
    }
    public function getAllProduct()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllProductWhereCategory($id)
    {
        $sql = "SELECT * FROM product WHERE cate_id=$id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getOneProductById($id)
    {
        $sql = "SELECT * FROM `product` WHERE id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function updateProduct($id,$name,$price,$cate_id,$quantity,$sale,$status,$img)
    {
        $sql = "UPDATE `product` SET `pro_name`=$name, `price`=$price, `img`=$img, `cate_id`=$cate_id, `quantity`=$quantity, `sale`=$sale,  `status`=$status WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        return $data;
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `product` WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        return $data;
    }
    public function addProduct($name, $price, $cate_id, $quantity, $sale, $status, $img)
    {
        $sql = "SELECT * FROM product WHERE pro_name LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute(["%$name%"]);
        return $data = $stmt->fetchAll();
    }
}