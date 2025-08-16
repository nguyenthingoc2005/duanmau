<?php
require_once 'views/admin/header.php';
?>
<div class="main">
    <aside>
        <?php
        require_once 'views/admin/sidebar.php';
        ?>
    </aside>
    <main>
        <style>
            .main main {
                flex: 1;
                background: #fff;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }

            .main main h1 {
                color: #ff6600;
                margin-bottom: 20px;
                font-size: 20px;
            }

            .main main form input[type="text"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 6px;
                font-size: 14px;
                outline: none;
                transition: 0.2s;
                margin-bottom: 15px;
            }

            .main main form input:focus {
                border-color: #ff6600;
                box-shadow: 0 0 4px rgba(255,102,0,0.4);
            }

            .main main form button {
                background-color: #ff6600;
                color: white;
                padding: 10px 18px;
                border: none;
                border-radius: 6px;
                font-size: 15px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .main main form button:hover {
                background-color: #e65500;
            }

            .main main form span {
                display: block;
                margin-top: 8px;
                font-size: 14px;
                color: red;
            }
        </style>
        <h1><?= $title ?></h1>
        <form action="<?= BASE_URL . '?mode=admin&act=them-danh-muc'?>" method="post">
            <input type="text" placeholder="tên danh mục" name="cat_name" />

            <button>Thêm mới</button>

            <?php if (isset($err)) { ?>
                <span>Thêm danh mục không thành công</span>
            <?php } ?>
        </form>
    </main>
</div>
<?php
require_once'views/admin/footer.php';
?>