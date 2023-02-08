<div class="container3">
    <div class="header3">
        <nav class="menu">
            <ul class="root">
                <li class="one"><div>Nhóm sản phẩm</div></li>
                <?php
                foreach ($categoryMenu as $parent):
                    $listChild = $parent['list_child'];

                    //định nghĩa đường dẫn
                $rootUrl="/flower_store/mvc/index.php";

                    ?>
                    <li><a href="">
                            <?php echo $parent['category_name'] ?> </a>
                        <ul class="sub">
                            <?php
                            foreach ($listChild as $child):
                                //đường dẫn tới category_detail
                                $url =$rootUrl."?controller=category&action=show&id=".$child['category_id'];
                                ?>
                                <li><a href="<?php echo $url; ?>"><?php echo $child['category_name'] ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php endforeach;?>
            </ul>
        </nav>
        <div class="slide" style="display: flex">
            <img src="./pub/media/product/slide2.jpg">
            <div class="happy-valentine">
                <img src="./pub/media/product/slide3.jpg">
                <a href="index.php?controller"><p>Hoa Đẹp cho dịp valentine</p></a>
            </div>

        </div>
    </div>
</div>