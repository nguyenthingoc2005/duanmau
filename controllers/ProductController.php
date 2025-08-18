<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }

    public function Home()
    {
        $product = $this->modelProduct->getAllProduct();
        require_once './views/admin/product/list_product.php';
    }
    public function Productdetail($id)
    {
        $product = $this->modelProduct->getOneProductById($id);

        require_once './views/admin/product/detail_product.php';
    }
    public function Addproduct()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pro_name = trim($_POST['pro_name']);
            $price = trim($_POST['price']);
            $quantity = trim($_POST['quantity']);
            $sale = trim($_POST['sale']);
            $status = trim($_POST['status']);
            $cate_id = trim(string: $_POST['cate_id']);

            if (empty($pro_name) || empty($price) || empty($quantity)  || empty($cate_id)) {
                $err = "Vui lòng nhập đầy đủ thông tin";
                $category = (new CategoryModel)->danhsach();
                require_once './views/admin/product/add_product.php';
                exit();
            }
            if ($sale === '') {
                $sale = 0;
            }
            $img = $_FILES['img'];
            $url = null;
            if ($img && $img['error'] == 0) {
                $url = uploadFile($img, '/uploads/imgproduct/');
            }
            $this->modelProduct->addProduct($pro_name, $price, $cate_id, $quantity, $sale, $status, $url);
            header("Location: ?mode=admin&act=list_product");
        } else {
            $category = (new CategoryModel)->danhsach();
            require_once './views/admin/product/add_product.php';
        }
    }
    public function Editproduct()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pro_name = trim($_POST['pro_name']);
            $price = trim($_POST['price']);
            $quantity = trim($_POST['quantity']);
            $sale = trim($_POST['sale']);
            $status = trim($_POST['status']);
            $cate_id = trim(string: $_POST['cate_id']);
            $id = $_POST['id'];

            if (empty($pro_name) || empty($price) || empty($quantity)  || empty($cate_id) || empty($id)) {
                $err = "Vui lòng nhập đầy đủ thông tin";
                header("Location: ?mode=admin&act=edit_product&id=$id");
                exit();
            }
            $img = $_FILES['img'];
            $url = $_POST['img_old'] ?? null;
            if ($img && $img['error'] == 0 && $img['size']  >  0) { // Kiểm tra xem có sửa ảnh không, có lỗi không, size ảnh có đúng không,
                $url = uploadFile($img, '/uploads/imgproduct/'); // Thay ảnh cũ thành ảnh mới
                if ($_POST['img_old']) {
                    deleteFile($_POST['img_old']); // Xóa ảnh cũ
                }
            }
            $this->modelProduct->updateProduct($id, $pro_name, $price, $cate_id, $quantity, $sale, $status, $url);
            header("Location: ?mode=admin&act=list_product");
        } else {
            $id = $_GET['id'] ?? null;
            $product = $this->modelProduct->getOneProductById($id);
            $category = (new CategoryModel)->danhsach();
            require_once './views/admin/product/edit_product.php';
        }
    }
    public function DeteleProduct($id)
    {
        $product = $this->modelProduct->getOneProductById($id);
        if ($product && $product['img']) {
            deleteFile($product['img']);
        }
        $this->modelProduct->deleteProduct($id);
        header('Location: ' . BASE_URL . '?mode=admin&act=list_product');
        exit;
    }
}