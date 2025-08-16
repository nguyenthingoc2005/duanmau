<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL. '/views/admin/css/style.css'?>">
    <title>Dashboard</title>
</head>
<body>
    <header class="main-header">
        <div class="container header-container">
            <div class="logo">
                <a href="<?= BASE_URL?>">TN SHOP</a>
            </div>
            <div class="right-header">
                <nav class="main-nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="?act=/" class="nav-link">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Liên hệ</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                <form class="search-form">
                    <input type="text" placeholder="search" required class="search-input">
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z" />
                    </svg>
                    </button>
                </form>
            </div>
        </div>

    </header>
</body>
</html>