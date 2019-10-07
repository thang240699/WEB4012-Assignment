<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="admin">
            <i class="material-icons">dashboard</i>
            <p> Quản lý chung </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#users">
            <i class="material-icons">people</i>
            <p> Quản lý users <b class="caret"></b></p>
        </a>
        <div class="collapse" id="users">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo e(URL::route('users.view')); ?>">
                        <span class="sidebar-mini">
                            <i class="material-icons">people</i>
                        </span>
                        <span class="sidebar-normal"> Các thành viên </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <span class="sidebar-mini">
                            <i class="material-icons">people</i>
                        </span>
                        <span class="sidebar-normal"> Vai trò </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <span class="sidebar-mini">
                            <i class="material-icons">people</i>
                        </span>
                        <span class="sidebar-normal"> Quyền người dùng </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#categories">
            <i class="material-icons">receipt</i>
            <p> Các danh mục <b class="caret"></b></p>
        </a>
        <div class="collapse" id="categories">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo e(URL::route('categories.view')); ?>">
                        <span class="sidebar-mini">
                            <i class="material-icons">receipt</i>
                        </span>
                        <span class="sidebar-normal"> Danh mục cha </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?php echo e(URL::route('sub-categories.view')); ?>">
                        <span class="sidebar-mini">
                            <i class="material-icons">receipt</i>
                        </span>
                        <span class="sidebar-normal"> Danh mục con </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo e(URL::route('products.view')); ?>">
            <i class="material-icons">shopping_basket</i>
            <p> Sản phẩm </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo e(URL::route('ratings.view')); ?>">
            <i class="material-icons">comment</i>
            <p> Đánh giá </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo e(URL::route('orders.view')); ?>">
            <i class="material-icons">offline_bolt</i>
            <p> Hoá đơn </p>
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">bar_chart</i>
            <p> Thống kê </p>
        </a>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/layouts/menu_nav.blade.php ENDPATH**/ ?>