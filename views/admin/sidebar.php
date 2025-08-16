<nav class="sidebar-nav">
    <ul class="sidebar-list">
        <li class="sidebar-item has-submenu">
            <a href="#" class="sidebar-link">Quản lý sản phẩm</a>
            <ul class="submenu">
                <li class="submenu-item"><a href="<?= BASE_URL . '?mode=admin&act=add_product'?>" class="submenu-link">Thêm sản phẩm</a></li>
                <li class="submenu-item"><a href="<?= BASE_URL . '?mode=admin&act=list_product'?>" class="submenu-link">Danh sách sản phẩm</a></li>
            </ul>
        </li>

        <li class="sidebar-item has-submenu">
            <a href="#" class="sidebar-link">Quản lý danh mục</a>
            <ul class="submenu">
                <li class="submenu-item"><a href="<?= BASE_URL . '?mode=admin&act=them-danh-muc'?>" class="submenu-link">Thêm danh mục</a></li>
                <li class="submenu-item"><a href="<?= BASE_URL . '?mode=admin&act=category'?>" class="submenu-link">Danh sách danh mục</a></li>
            </ul>
        </li>
    </ul>
</nav>