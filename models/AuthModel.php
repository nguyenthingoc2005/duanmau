<?php
class AuthModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function findUser($email,$password)
    {
        $sql= "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["email"=> $email]);
        $user = $stmt->fetch();
        if($user && $password === $user["password"]){
            return $user;
        }
        return false;
    }
    public function checkEmailExists($email)
    {
        $sql= "SELECT * FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["email"=> $email]);
        $user = $stmt->fetch();
    }
    public function createUser($name,$email,$password)
    {
        $sql= "INSERT INTO `users` (`name`,`email`,`password`,`role`) VALUES (:user_name,:email,:password,0)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["user_name"=> $name,"email"=> $email,"password"=> $password]);
    }
}