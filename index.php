<?php 
session_start();
define('PATH_ROOT'    , __DIR__);

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductController.php';
require_once './controllers/DashboardController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/AuthController.php';
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/ProductModel.php';
require_once './models/AuthModel.php';
require_once './models/CategoryModel.php';
require_once './models/CartModel.php';

// Route
if(isset($_GET['mode']) && $_GET['mode'] == 'admin') {
    if(empty($_SESSION['islogin']) || $_SESSION['role'] !=1){
        header('Location: ' .BASE_URL.'?mode=auth&act=login');
        exit(); 
    }
    require_once('views/admin/index.php');
}else{
    require_once('views/client/index.php');
}
// $act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

// match ($act) {
//     // Trang chủ
//     '/' => (new ProductController())->Home(),
    
// };