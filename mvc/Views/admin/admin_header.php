<div class="admin-container">
    <div class="admin-header">
        <ul>
            <li class="c1">
                <a href="index.php?controller=homeAdmin&action=index"><img src="./pub/media/product/admin.jpg"/></a>
            </li>
            <li class="c2">
                <form action="index.php?controller=category&action=show" method="POST">
                    <input type="text" name="product_name" placeholder="Tôi muốn tìm ..."><button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </li>
            <li class="c3">

                    <ul class="admin">
                        <li>
                            <form>
                                <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                                <button type="button" name=""><a
                                            href="index.php?controller=customer&action=login_page"><?php //echo $_SESSION["customer_name"] ?>Admin</a>
                                </button>
                            </form>
                        </li>
                        <li class="ngan">|</li>
                        <li>
                            <form>
                                <button type="button" name=""><a href="index.php?controller=customer&action=logout">Đăng
                                        Xuất</a></button>
                            </form>
                        </li>


                    </ul>

            </li>
        </ul>
    </div>
</div>