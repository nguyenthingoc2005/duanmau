<?php
checkAdmin();
?>
<?php
$act = $_GET['act'] ?? '/';
$role = $_SESSION['role'] ?? null;
 if($role != "1"){
    header("Location: " .BASE_URL);
}
match($act){
    '/' =>(new DashboardController())->Dashboard(),
    'category'=> (new CategoryController())->showCategory(),
    'edit_category' => (new CategoryController())->haldleEditCategory(),
    'update_category' => (new CategoryController())->haldleUpdateCategory(),
    'them-danh-muc' => (new CategoryController())->AddControllerView(),
    'delete_category' => (new CategoryController())->haldleDeleteCategory(),
    'list_product' =>(new ProductController())->Home(),
    'detail_product' => (new ProductController())->Productdetail(),
    'add_product' => (new ProductController())->Addproduct(),
    'edit_product' => (new ProductController())->Editproduct(),
    'delete_product' => (new ProductController())->DeleteProduct(),
};
?>