<?php
require_once 'header.php';
?>
<main class="main-content" style="min-height: 40svh;">
    <div class="container" style="margin-top: 40px;">
        <div class="product-detail-layout">
            <div class="product-detail-image">
                <!-- htmlspecialchars: dùng để tránh trùng với thẻ của html -->
                <img src="<?= BASE_URL . htmlspecialchars($product['img']) ?>"
                     alt="<?= htmlspecialchars($product['pro_name']) ?>">
            </div>
            <div class="product-detail-info">
                <h1><?= htmlspecialchars($product['pro_name']) ?></h1>
                
                <div class="price-section">
                    <?php if ($product['sale'] > 0): ?>
                        <span class="sale-price">
                            <?= number_format($product['price'] - $product['sale'], 0, ',', '.') ?> đ
                        </span>
                        <span class="original-price">
                            <?= number_format($product['price'], 0, ',', '.') ?> đ
                        </span>
                    <?php else: ?>
                        <span class="sale-price">
                            <?= number_format($product['price'], 0, ',', '.') ?> đ
                        </span>
                    <?php endif; ?>
                </div>

                <p><strong>Tình trạng:</strong>
                    <?= $product['status'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?>
                </p>
                <p><strong>Số lượng còn:</strong> <?= htmlspecialchars($product['quantity']) ?></p>

                <form action="?act=add_cart" method="post" class="add-to-cart-detail-form">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?= htmlspecialchars($product['quantity']) ?>">
                    <button type="submit">
                        🛒 Thêm vào giỏ
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
require_once 'footer.php';
?>