<?php
class CategoryController
{
    public $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new CategoryModel();
    }
    public function showCategory()
    {
        $category = $this->modelCategory->danhsach();
        views('views/admin/category/list_category',['category' => $category]);
    }
    public function AddControllerView()
    {
        if($_SERVER['REQUESST_METHOD'] == 'POST'){
            print_r($_POST);
            if(!empty($_POST['cat_name'])){
                $cat_name = trim($_POST['cat_name']);
                $this->modelCategory->addCategory($cat_name);
                header('Location: ?mode=admin&act=category');
            }else{
                $err = 'Thêm danh mục không thành công';
                require_once './views/category/addcategory.php';
            }
        }else{
            $title = 'Thêm danh mục';
            require_once './views/category/addcategory.php';
        }
    }
    public function haldleEditController()
    {
        $id = $_GET['id'] ?? null;
        if($id){
            $category = $this->modelCategory->getOneCategoryById($id);
            views('views/admin/category/edit_category.php');
            die();
        }else{
            echo 'Không tìm thấy danh mục';
        }
    }
    public function haldleDeleteCategory()
    {
        $id = $_GET['id'] ?? null;
        if($id){
            $check = $this->modelCategory->checkProductById($id);
            if($check === false){
                $cate = $this->modelCategory->deleteCategory($id);
            }else{
                echo 'Không thể xóa danh mục';
                exit();
            }
            header('Location: ' .BASE_URL .'?mode=admin&act=');
            exit();
        }else{
            echo 'Không tìm thấy danh mục';
        }
    }
    public function haldleUpdateProduct()
    {
        $id = $_GET['id'] ?? null;
        $cat_name = $_POST['cat_name'];
        if(empty($cat_name)){
            echo "Không có tên";
        }
        if($id){
            $category = $this->modelCategory->updateCategory($id, $cat_name);
            header("Location: " .BASE_URL ."?mode=admin&act=category");
            exit();
        }else{
            echo "Không tìm thấy danh mục";
        }
    }

}
