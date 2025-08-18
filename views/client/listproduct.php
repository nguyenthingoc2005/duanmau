<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Danh mục - TN SHOP</title>

</head>
<body>
    <?php include PATH_ROOT . "/views/client/header.php" ?>
    

    <?php

    if ($msg) {
        echo "<p class='success-message'>$msg</p>";
        unset($_SESSION['cart']);
    }
    ?>

    <main class="">
     
       <div class="container" style="margin-top: 40px;">

         <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php include PATH_ROOT . "/views/client/product.php" ?>
            <?php endforeach; ?>
            <?php if(count($products) == 0):    ?> 
                <p>Không tìm thấy sản phẩm nào</p>
            <?php endif;    ?>
        </div>
       </div>
    </main>

    <?php include PATH_ROOT . "/views/client/footer.php" ?>
</body>
</html>