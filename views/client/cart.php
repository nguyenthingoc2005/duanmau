<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/views/client/css/style.css">
</head>
<body>
    <?php include PATH_ROOT . "/views/client/header.php" ?>

    <main class="main-content container">
        <h1 class="cart-page-title">Giỏ hàng của bạn</h1>

        <?php if (empty($allCart)): ?>
            <p class="empty-cart-message">Giỏ hàng của bạn đang trống.</p>
        <?php else: ?>
            <div class="cart-item-grid">
                <?php foreach ($allCart as $item): ?>
                    <div class="cart-item-card">
                        <img src="<?= BASE_URL . htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>">

                        <div class="item-details">
                            <h4><?= htmlspecialchars($item['product_name']) ?></h4>
                            <p>Giá: <?= number_format((float)$item['price'], 0, ',', '.') ?> VNĐ</p>
                        </div>

                        <div class="quantity-controls">
                            <form action="<?= BASE_URL ?>?act=update_cart" method="POST">
                                <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['cart_item_id']) ?>">
                                <input type="hidden" name="action" value="decrease">
                                <button type="submit">-</button>
                            </form>

                            <span><?= htmlspecialchars($item['quantity']) ?></span>
                           <!-- htmlspecialchars: chuyển đổi các ký tự đặc biệt thành dạng mã HTML an toàn -->

                            <form action="<?= BASE_URL ?>?act=update_cart" method="POST">
                                <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['cart_item_id']) ?>">
                                <input type="hidden" name="action" value="increase">
                                <button type="submit">+</button>
                            </form>
                        </div>

                        <form action="<?= BASE_URL ?>?act=remove_cart_item" method="POST" class="remove-btn-form">
                            <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['cart_item_id']) ?>">
                            <button type="submit" class="remove-btn">Xóa</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include PATH_ROOT . "/views/client/footer.php" ?>
</body>
</html>