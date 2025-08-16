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
        <a href="?mode=admin&act=them-danh-muc">Thêm danh mục</a>
        <table>
            <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <body>
                <?php
                foreach ($category as $cate) : ?>
                <tr>
                    <td><?= $cate['id'] ?></td>
                    <td><?= $cate['cat_name'] ?></td>
                    <td>
                        <a href="?mode=admin&act=edit_category&id=<?= $cate['id']?>">Sửa</a>
                        <a href="?mode=admin&act=delete_category&id=<?= $cate['id']?>" onclick="return(confirm('Bạn có chắc muốm xóa không?'))">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </body>
        </table>
    </main>
</div>