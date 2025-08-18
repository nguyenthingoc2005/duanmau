<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - TN SHOP</title>
</head>
<body>
    <?php include PATH_ROOT . "/views/client/header.php" ?>
    <?php 
    if($msg){
        echo "<p class='success-message'>$msg</p>";
        unset($_SESSION["cart"]);
    }
    ?>
    <main class="">
        <?php include PATH_ROOT . "/views/client/banner.php" ?>
        <div class="container" style="margin-top : 40px;">
            <h2>Top sản phẩm bán chạy</h2>
            <div class="product-grid">
                <?php   foreach ($products as $product): ?>
                    <?php include PATH_ROOT . "/views/client/product.php" ?>
                    <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php include PATH_ROOT . "/views/client/footer.php" ?>
</body>
</html>