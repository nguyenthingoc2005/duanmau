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
        <a href="?mode=admin&act=add_product">Thêm sản phẩm</a>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên sản phẩm</td>
                    <td>Ảnh sản phẩm</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Giá khuyến mại</td>
                    <td>Hành động</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($product as $pro) :
                    ?>
                    <td><?= $pro['id']?></td>
                    <td><?= $pro['pro_name']?></td>
                    <td><img src="<?= BASE_URL . $pro['img']?>" alt="" width="90px"></td>
                    <td><?= $pro['price']?></td>
                    <td><?= $pro['quantity']?></td>
                    <td><?= $pro['sale']?></td>
                    <td>
                        <a style="color: black" href="?mode=admin&act=edit_product&id=<?= $pro['id']?>">Sửa</a>
                        <a style="color: black" href="?mode=admin&act=detail_product&id=<?= $pro['id']?>">Chi tiết</a>
                        <a href="?mode=admin&act=delete_product&id=<?= $pro['id']?>" onclick="return (confirm('Bạn có chắc muốn xóa không'))">Xóa</a>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</div>
<?php
require_once './views/admin/footer.php';
?>