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
        <form action="<?= BASE_URL . "?mode=admin&act=edit_product"?>" method="post" enctype="multipart/form-data">
            <label for="pro_name">Tên sản phẩm</label>
            <input type="text" id="pro_name" name="pro_name" value="<?= $product['pro_name']?>">
            <input type="hidden" name="id" id="pro_name" value="<?= $product['id']?>">
            <br>
            <label for="price">Giá sản phẩm</label>
            <input type="number" id="price" name="price" value="<?= $product['price']?>">
            <br>
            <label for="img">Hình ảnh</label>
            <input type="file" id="img" name="img" value="<?= $product['img']?>">
            <p>Ảnh cũ</p>
            <input type="hidden" name="img_old" value="<?= $product['img']?>">
            <img src="<?= BASE_URL . $product['img']?>" alt="" width="90px">
            <br>
            <label for="quantity">Số lượng</label>
            <input type="number" id="quantity" name="quantity" value="<?= $product['quantity']?>">
            <br>
            <label for="sale">Khuyến mãi</label>
            <input type="number" id="sale" name="sale" value="<?= $product['sale']?>">
            <br>
            <label for="status">Trạng thái</label>
            <select name="status" id="">
                <option <?= $product['status'] == 1 ? "selected" : "" ?> value="1">Bán</option>
                <option <?= $product['status'] == 0 ? "selected" : "" ?> value="0">Chuẩn bị bán</option>
            </select>
            <br>
            <label for="cate_id">Danh mục</label>
            <select name="cate_id" id="">
                <option value="0">Vui lòng chọn danh mục</option>
                <?php
                foreach ($category as $cate):
                ?>
                    <option <?= $product['cate_id'] == $cate['id'] ?  "selected" : ""   ?> value="<?= $cate['id'] ?>"><?= $cate['cat_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Cập nhật</button>
            <?php
            if (isset($err)) {
            ?>
                <span style="color:red"><?= $err ?></span>
            <?php
            }
            ?>
        </form>
    </main>
</div>
<?php
require_once './views/admin/footer.php';
?>