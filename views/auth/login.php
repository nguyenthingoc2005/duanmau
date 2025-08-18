<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - TN SHOP</title>
    <style>
    * {
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  margin: 0;
  background: linear-gradient(120deg, #ffc1cc, #ffb6c1);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-box {
  background: #fff0f5;
  padding: 30px 35px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
  width: 400px;
  border: 2px solid #ff69b4;
  animation: fadeIn 0.4s ease-in-out;
}

.logo {
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  color: #d81e5b;
  margin-bottom: 20px;
}

h2 {
  text-align: center;
  margin-bottom: 24px;
  font-weight: 600;
  color: #d81e5b;
}

.form-group {
  margin-bottom: 18px;
}

label {
  font-size: 14px;
  color: #c71585;
  margin-bottom: 6px;
  display: block;
  font-weight: 600;
}

input {
  width: 100%;
  padding: 12px;
  border: 1.8px solid #ffb6c1;
  border-radius: 8px;
  font-size: 15px;
  transition: border-color 0.3s, box-shadow 0.3s;
  outline: none;
}

input:focus {
  border-color: #d81e5b;
  box-shadow: 0 0 8px #ff69b4;
}

.btn {
  width: 100%;
  background: #d81e5b;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 8px;
  font-size: 17px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.3s ease;
}

.btn:hover {
  background: #ff69b4;
}

.links {
  margin-top: 16px;
  text-align: center;
  font-size: 14px;
  color: #c71585;
}

.links a {
  color: #d81e5b;
  text-decoration: none;
  font-weight: 600;
}

.links a:hover {
  text-decoration: underline;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

  </style>
</head>
<body>
    <div class="login-box">
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