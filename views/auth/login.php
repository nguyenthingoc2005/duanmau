<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - TN SHOP</title>
</head>
<body>
    <div class="login_box">
        <div class="logo">TN SHOP</div>
        <h2>Đăng nhập</h2>
        <?php if (!empty($error)): ?>
          <p><?= $error ?></p>
          <?php endif; ?>
          <form action="?act=login" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập email của bạn">
            </div>
            <button type="submit" class="btn">Đăng nhập</button>
          </form>
          <div class="links">
            <a href="#">Quên mật khẩu?</a> • <a href="?mode=auth&act=register">Đăng ký</a>
          </div>
    </div>
</body>
</html>