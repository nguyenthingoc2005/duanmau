<?php
$act = $_GET['act'] ?? '/';
match ($act){
     '/' => (new HomeController())->Home(),
    'login'  => (new AuthController())-> login(),
    'register'  => (new AuthController())-> register(),
    'logout'  => (new AuthController())-> logout(),
    'add_cart' => (new HomeController())->add_cart(),
    'cart' => (new HomeController())->cart(),
    'update_cart' => (new HomeController())->update_cart(),
    'remove_cart_item' => (new HomeController())->remove_cart_item(),
    'detail_product' => (new HomeController())->showProduct($_GET['id']),
    'category' => (new HomeController())->category($_GET['id']),
    'search' => (new HomeController())->search(),
};