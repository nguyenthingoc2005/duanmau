<?php
require_once './views/admin/header.php';
?>
<div class="main">
    <aside>
        <?php
        require_once './views/admin/sidebar.php';
        ?>
    </aside>
    <main>
        <link rel="stylesheet" href="./views/admin/css/style.css">
        <div class="container">
            <div class="product-img">
                <img src="<?= $product['img'] ?>" alt="<?= $product['pro_name'] ?>">
            </div>
            <div class="product-info">
                <h1><?= $product['pro_name'] ?></h1>
                <div>
                    <span class="price"><?= number_format($product['price'] - $product['sale'], 2) ?>đ</span>
                    <span class="old_price"><?= number_format($product['price'], 2) ?>đ</span>
                </div>
                <div class="quantity">Số lượng: <?= $product['quantity'] ?></div>
                <div class="status">
                    <?php if ($product['status'] == 111): ?>
                        Còn hàng
                    <?php else: ?>
                        Hết hàng
                    <?php endif; ?>
                </div>
                <button>Thêm vào giỏ hàng</button>
            </div>
        </div>
</div>
</main>
</div>
<?php
require_once './views/admin/footer.php';
?>