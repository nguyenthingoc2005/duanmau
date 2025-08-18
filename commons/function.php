<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
function uploadFile($file, $folderSave) {
    $file_upload = $file;
    $pathStorage = $folderSave . rand(10000,99999). $file_upload['name'];
    $tmp_file = $file_upload['tmp_name'];
    $pathSave = PATH_ROOT . $pathStorage;
    if(move_uploaded_file($tmp_file, $pathSave)) {
        return $pathStorage;
    }
    return null;
}
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if(file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
function views($views,$data = [])
{
    extract($data);
    require_once PATH_ROOT . "/$views.php";
}
function checkAdmin(){
    if(empty($_SESSION['islogin']) || $_SESSION['role'] !=1){
        header('Location: ' .BASE_URL .'?mode=auth&act=login');
        exit();
    }
}
