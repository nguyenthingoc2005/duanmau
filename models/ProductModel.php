<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class ProductModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getAllProductWhereCategory($id)
    {
        $sql = "Select * FROM product where cate_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getOneProductById($id)
    {
        $sql = "SELECT * FROM product Where id = $id";
        $stmt = $this->conn->query($sql);
        $data = $stmt->fetch();
        return $data;
    }
    public function updateProduct($id, $name, $price, $cate_id, $quantity, $sale, $status, $img)
    {
        $sql = "UPDATE `product` SET `pro_name`='$name',`price`='$price',`img`='$img',`cate_id`='$cate_id',`quantity`='$quantity',`sale`='$sale',`status`='$status' WHERE id = $id";
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
        $sql = "INSERT INTO `product`( `pro_name`, `price`, `img`, `cate_id`, `quantity`, `sale`, `status`) VALUES ('$name','$price','$img','$cate_id','$quantity','$sale','$status')";
        $stmt = $this->conn->prepare($sql);
        $data = $stmt->execute();
        return $data;
    }
     public function searchProductsByName($name)
    {
        $sql = "SELECT * FROM product WHERE pro_name LIKE ?";
        $stmt = $this->conn->prepare($sql);
         $stmt->execute(["%$name%"]);
        return $data = $stmt->fetchAll();
    }
}