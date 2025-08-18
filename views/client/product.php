<?php if (isset($product)): ?>
    <div class="product-card">
        <a href="?act=detail_product&id=<?= htmlspecialchars($product['id']); ?>">
            <img src="<?= BASE_URL . htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['pro_name']) ?>" class="product-image">
        </a>
        <div class="product-info">
            <h3 class="product-name">
                <a href="?act=detail_product&id=<?= htmlspecialchars($product['id']); ?>">
                    <?= htmlspecialchars($product['pro_name']); ?>
                </a>
            </h3>
            <div class="product-price">
                <?php if ($product['sale'] > 0 && $product['sale'] < $product['price']): ?>
                    <span class="original-price"><?= number_format($product['price'], 0, ',', '.'); ?>đ</span>
                    <span class="sale-price"><?= number_format($product['price'] - $product['sale'], 0, ',', '.'); ?>đ</span>
                <?php else: ?>
                    <span class="sale-price"><?= number_format($product['price'], 0, ',', '.'); ?>đ</span>
                <?php endif; ?>
            </div>
           
        </div>
    </div>
<?php endif; ?>

<!-- number_forma: định dạng số thành chuỗi có phân cách hàng nghìn, dấu thập phân  -->