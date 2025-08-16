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
        <style>
            /* Chỉ áp dụng CSS cho form trong main */
         .main main {
            flex: 1;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
         }
         .main main form label {
            font-weight: bold;
            display: block;
            margin: 12px 0 6px;
            color: #ff6600;
         }
         .main main form input[type="text"],
         .main main form input[type="number"],
         .main main form input[type="file"],
         .main main form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
         }
         .main main form input:focus,
         .main main form select:focus {
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
            margin-top: 15px;
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
        <form action="<?= BASE_URL . '?mode=admin&act=add_product'?>" method="post" enctype="multipart/form-data">
            <label for="pro_name">Tên sản phẩm</label>
         <input type="text" id="pro_name" name="pro_name">

         <label for="price">Giá sản phẩm</label>
         <input type="number" id="price" name="price">

         <label for="img">Hình ảnh</label>
         <input type="file" id="img" name="img">

         <label for="quantity">Số lượng</label>
         <input type="number" id="quantity" name="quantity">

         <label for="sale">Khuyến mãi</label>
         <input type="number" id="sale" name="sale">

         <label for="status">Trạng thái</label>
         <select name="status" id="">
            <option value="1">Bán</option>
            <option value="0">Chuẩn bị bán</option>
         </select>

         <label for="cate_id">Danh mục</label>
         <select name="cate_id" id="">
            <option value="0">Vui lòng chọn danh mục</option>
            <?php foreach ($category as $cate): ?>
               <option value="<?= $cate['id'] ?>"><?= $cate['cat_name'] ?></option>
            <?php endforeach; ?>
         </select>

         <button type="submit">Thêm sản phẩm</button>

         <?php if (isset($err)): ?>
            <span><?= $err ?></span>
         <?php endif; ?>
        </form>
    </main>
</div>
<?php
require_once './views/admin/footer.php';
?>
