<?php
class AuthController
{
    public $authModel;
    public $cartModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->cartModel = new CartModel();
    }
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = trim($_POST["username"] ?? '');
            $email = trim($_POST["email"] ?? '');
            $password = trim($_POST["password"] ?? '');
            $confirm = trim($_POST["confirm"] ?? '');
            if (empty($name) || empty($email) || empty($password) || empty($confirm)){
                $error = "Vui lòng điền đầy đủ thông tin.";
                require './views/auth/register.php';
                return;
            }
            if($password != $confirm){
                $error = "Mật khẩu không khớp";
                require './views/auth/register.php';
                return;
            }
            //KIểm tra xem email đã tòn tại hay chưa
            if($this->authModel->checkEmailExists($email)){
                $error = "Email đã được sử dụng.";
                require './views/auth/register.php';
                return;
            }
            //Tạo tài khoản
            $this->authModel->createUser($name, $email, $password);
            header("Location: index.php?act=login");
            exit;
        }else{
            require './views/auth/register.php';
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password$password'] ?? '');
            if(empty($email) || empty($password)){
                $error = "Vui lòng điền đầy đủ thông tin.";
                require './views/auth/login.php';
                return;
            }
            $user = $this->authModel->findUser($email, $password);
            if(!$user){
                $error = "Email hoặc mật khẩu không đúng.";
                require './views/auth/login.php';
                return;
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['islogin'] = true;
            if($this->cartModel->isCartUserWhereIdUser($user['id'])=== false){
                $this->cartModel->createCart($user['id']);
            }
            header('Location ' .BASE_URL.);
        }else{
            require './views/auth/login.php';
        }
    }
    public function logout()
    {
        session_destroy();
        header('Location'.BASE_URL.'?act=login');
    }
}