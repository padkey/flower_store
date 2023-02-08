<div class="container1">
    <div class="header1">
        <?php
        //nếu tồn tại customer_id
        if(isset($_SESSION["customer_id"]) ): ?>
            <ul>
                <li>
                    <form>
                        <button type="button" name=""><a href="index.php?controller=customer&action=logout">Đăng Xuất</a></button>
                    </form>
                </li>
                <li class="ngan">|</li>
                <li>
                    <form>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                        <button type="button" name=""><a href="index.php?controller=customer&action=login_page"><?php echo $_SESSION["customer_name"] ?></a></button>
                    </form>
                </li>
            </ul>
        <?php else: ?>
            <ul>
                <li>
                    <form>
                        <button type="button" name=""><a href="index.php?controller=customer&action=register_page">Đăng kí</a></button>
                    </form>
                </li>
                <li class="ngan">|</li>
                <li>
                    <form>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                        <button type="button" name=""><a href="index.php?controller=customer&action=login_page">Đăng nhập</a></button>
                    </form>
                </li>
            </ul>
        <?php endif; ?>

    </div>
</div>
<div class="container2">
    <div class="header2">
        <form></form>
        <ul>
            <li class="c1">
                <a href="index.php?controller=home&action=index"><img src="./pub/media/product/logo.png"/></a>
            </li>
            <li class="c2"><i class="fa fa-map-marker" aria-hidden="true" style="color:green;font-size:20px"></i> Gửi
                đến
                <select>
                    <option>Hồ Chí Minh</option>
                    <option>Hà Nội</option>
                    <option>Đà Nẵng</option>
                    <option>Quãng Ngãi</option>
                </select>
            </li>
            <li class="c3">
                <form action="index.php?controller=category&action=show" method="POST">
                    <input type="text" name="product_name" placeholder="Tôi muốn tìm ..."><button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </li>
            <li class="c4">
                <form>
                    <a href="index.php?controller=cart&action=index">
                        <button type="button">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <p>Giỏ Hàng</p>
                        </button>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>