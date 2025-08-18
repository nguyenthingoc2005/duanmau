<?php
class HomeController
{
    public $category;
    public $product;
    public $cart;
    public function __construct()
    {
        $this->category = new CategoryModel();
        $this->cart = new CartModel();
        $this->product = new ProductModel();
    }
    public function Home()
    {
        $category = $this->category->danhsach();
        $products = $this->product->getAllProduct();
        $user = $_SESSION['islogin'] ?? null;
        if ($user) {
            $idUser = $_SESSION['id'];
            $idCart = $this->cart->isCartUserWhereIdUser($idUser);
            $cartId = $idCart['id'];
            $countCart = $this->cart->getQuantityProductWhereCartId($cartId);
        }
        if (isset($_GET['name'])) {
            $keyword = $_GET['name'];
            $product = $this->product->searchProductsByName($keyword);
            include PATH_ROOT . '/views/clent/listproduct.php';
            exit();
        }
        require PATH_ROOT . '/views/client/trangchu.php';
    }
    public function add_cart()
    {
        $idProduct = $_POST['product_id'];
        $user = $_SESSION['islogin'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;
        if ($user) {
            $idUser = $_SESSION['id'];
            $this->cart->add_cart($idUser, $idProduct, $quantity);
        } else {
            echo 'Vui lòng đăng nhập';
        }
    }
    public function cart()
    {
        $user = $_SESSION['islogin'] ?? null;
        if ($user) {
            $idUser = $_SESSION['id'];
            // lấy ra id người dùng và lấy ra id giỏ hàng
            $idCart = $this->cart->isCartUserWhereIdUser($idUser); // Lấy ra id của giỏ hàng theo $idUser
            $cartId = $idCart['id'];
            if (!$idCart) { // Đã có giỏ hàng hay chưa, nếu chưa có thì tạo
                $cartId = $this->cart->createCart($idUser);
            }
            $allCart = $this->cart->getAllCart($cartId); // Lấy ra danh sách sản phẩm trong giỏ hàng
            $countCart = $this->cart->getQuantityProductWhereCartId($cartId);  // Lấy tỏng số lượng sản phẩm trong giỏ hàng
            $category = $this->category->danhsach();
            include PATH_ROOT . '/views/client/cart.php';
        } else {
            echo "<script>alert('Bạn cần đăng nhập');</script>";
            require_once './views/auth/login.php';
        }
    }
    // Xử lý việc tăng hoặc giảm số lượng sản phẩm trong giỏ hàng.
    public function update_cart()
    {
        // 1. Lấy ID của mục giỏ hàng và hành động (tăng/giảm) từ POST
        $cartItemId = $_POST['cart_id'];
        $action = $_POST['action'];
        // 2. Kiểm tra hành động và gọi hàm tương ứng trong CartModel
        if ($action === 'increase') {
            $this->cart->increaseQuantity($cartItemId);
        } else if ($action === 'decrease') {
            $this->cart->decreaseQuantity($cartItemId);
        }
        // 3. Sau khi xử lý, chuyển hướng người dùng về trang giỏ hàng
        header('Location: ' . BASE_URL . '?act=cart');
    }
    //Xóa 1 sản phẩm khỏi giỏ hàng
    public function remove_cart_item()
    {
        // 1. Lấy ID của mục giỏ hàng cần xóa từ POST
        $cartItemId = $_POST['cart_id'];
        // 2. Gọi hàm xóa sản phẩm trong CartModel
        $this->cart->removeCartItem($cartItemId);
        // 3. Sau khi xóa, chuyển hướng người dùng về trang giỏ hàng
        header('Location: ' . BASE_URL . '?act=cart');
    }
    public function showProduct($id)
    {
        if (!$id) {
            echo "Sản phẩm không tồn tại";
            exit();
        } else {
            $category = $this->category->danhsach();
            $product = $this->product->getAllProductWhereCategory($id);
            require PATH_ROOT . "/views/client/listproduct.php";
        }
    }
    public function category($id)
    {
        if(!$id){
            echo "Không tìm thấy danh mục";
        }else{
            $category = $this->category->danhsach();
            $products = $this->product->getAllProductWhereCategory($id);
            include PATH_ROOT . "/views/client/listproduct.php";
        }
        exit();
    }
}