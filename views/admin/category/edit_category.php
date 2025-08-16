<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sửa danh mục</h1>
    <form action="?mode=admin&act=update_category" method="post">
        <label for="name">Name</label>
        <input type="text" name="cat_name" id="" value="<?= $category['cat_name'] ?>">
        <input type="hidden" name="id" id="" value="<?= $category['id'] ?>">
        <br>
        <button>Cập nhật</button>
    </form>
</body>
</html>