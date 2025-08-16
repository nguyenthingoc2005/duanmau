<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(120deg, #ffc1cc, #ffb6c1);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.register-container {
    background: #fff0f5;
    padding: 30px 35px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
    width: 400px;
    border: 2px solid #ff69b4;
}

.register-container h2 {
    text-align: center;
    color: #d81e5b;
    margin-bottom: 25px;
    font-weight: 700;
    letter-spacing: 1.2px;
}

.register-container form {
    display: flex;
    flex-direction: column;
}

.register-container label {
    margin-bottom: 6px;
    font-weight: 600;
    color: #c71585;
    font-size: 14px;
}

.register-container input {
    padding: 12px;
    margin-bottom: 18px;
    border-radius: 8px;
    border: 1.8px solid #ffb6c1;
    outline: none;
    font-size: 15px;
    transition: 0.3s;
}

.register-container input:focus {
    border-color: #d81e5b;
    box-shadow: 0 0 8px #ff69b4;
}

.register-container button {
    background: #d81e5b;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 17px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.register-container button:hover {
    background: #ff69b4;
}

.register-container .link {
    text-align: center;
    margin-top: 12px;
    font-size: 14px;
    color: #c71585;
}

.register-container .link a {
    color: #d81e5b;
    text-decoration: none;
    font-weight: 600;
}

.register-container .link a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div class="register-container">
        <h2>Đăng ký</h2>
        <?php if(!empty($error))?>
        <p><?= $error ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="password" id="confirm" name="confirm" required>
            <button type="submit">Đăng ký</button>
        </form>
        <div class="link">
            Đã có tài khoản? <a href="?mode=auth&act=login">Đăng nhập</a>
        </div>
    </div>
</body>
</html>