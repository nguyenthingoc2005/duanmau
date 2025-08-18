<?php
// có class chứa các function thực thi xử lý logic 
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
        // var_dump($category);
        // die();
        views('views/admin/category/list_category', ['category' => $category]);
    }

    public function AddControllerView()
    {
        //Kiểm tra phương thức của url
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo "khong vui";
            print_r($_POST);

            if (!empty($_POST['cat_name'])) {
                $cat_name = trim($_POST['cat_name']);
                $this->modelCategory->addCategory($cat_name);
                header('Location: ?mode=admin&act=category');
            } else {
                $err = 'Thêm danh mục không thành công';
                require_once './views/category/addcategory.php';
            }
        } else {
            $title = "Thêm danh mục";
            require_once './views/admin/category/addcategory.php';
        }
    }

    public function haldleEditCategory()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $category = $this->modelCategory->getOneCategoryById($id);
            views('views/admin/category/edit_category', ['category' => $category]);
            die();
        } else {
            echo "Khong tim thay danh muc";
        }
    }
    public function haldleDeleteCategory()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            // var_dump($this->modelCategory->checkProductById($id));
            $check = $this->modelCategory->checkProductById($id); // Kiểm tra xem là có sản phẩm nào thuộc danh mục này không
            if ($check === false) { // Nếu không có sản phẩm nào thuộc danh mục đấy, thì mới cho xóa
                $category = $this->modelCategory->deleteCategory($id);
            } else { // Còn có sản phẩm thuộc danh mục thì không cho xóa
                echo "Không thể xóa danh mục";
                exit;
            }

            header('Location: ' . BASE_URL . '?mode=admin&act=category');
            exit;
        } else {
            echo "Khong tim thay danh muc";
        }
    }
    public function haldleUpdateCategory()
    {

        $id = $_POST['id'] ?? null;
        $cat_name = $_POST['cat_name'];
        // checkLoi($cat_name);
        if (empty($cat_name)) {
            echo "Ko có name";
        }

        if ($id) {
            $category = $this->modelCategory->updateCategory($id, $cat_name);
            // checkLoi($category);
            header('Location: ' . BASE_URL . '?mode=admin&act=category');
            exit;
        } else {
            echo "Khong tim thay danh muc";
        }
    }
}