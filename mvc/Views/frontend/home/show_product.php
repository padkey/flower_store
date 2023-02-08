<div class="container4">
    <div class="box-pro-home">
        <div class="box-title">
            <div class="box-text">Sản phẩm nổi bật</div>
        </div>
        <?php
        foreach ($Products as $product):

            $product_name= $product['product_name'];
            $product_price = $product['price'];
            $urlImage = 'pub/'. $product['thumbnail'];
            $rootURL = "/flower_store/mvc/index.php";
            $url = $rootURL."?controller=product&action=show&id=".$product['product_id'];
            //hình nhỏ
            /*$listSmallImage = explode('|',$list['small_image']);
            $smallImage = 'pub/'.$listSmallImage[1];*/
            ?>
            <a href="<?php echo $url ?>">

                <div class="item-pro-home">
                    <div class="box-img-pro-home">
                        <img src="<?php echo $urlImage ?>"/>
                    </div>
                    <div class="product-text">

                        <div class="product-name"><a href="">
                                <?php echo $product_name; ?>
                            </a></div>
                        <div class="product-price"><p> <?php echo number_format($product_price,0); ?> VNĐ
                            <div class="icon-basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                            </p>
                        </div>

                    </div>

                </div>
            </a>
        <?php endforeach;?>

    </div>
</div>

<div class="container5">
    <div class="box-pro-home">
        <div class="box-title">
            <div class="box-text">Ngày sinh nhật </div>
        </div>
    <?php foreach ($productsBirthday as $productBirthday):
                    $product_name = $productBirthday['product_name'];
                    $price = $productBirthday['price'];
                    //lấy hình cho product
                    $urlImage='pub/'.$productBirthday['thumbnail'];
                    //lấy đường dẫn liên kết tới product detail
                    $rootUrl = '/flower_store/mvc/index.php';
                    $url=$rootUrl."?controller=product&action=show&id=".$productBirthday['product_id'];


    ?>
        <a href="<?php echo $url; ?>">
        <div class="item-pro-home">
            <div class="box-img-pro-home">
                <img src="<?php echo $urlImage; ?>"/>
            </div>
            <div class="product-text">
                <div class="product-name"><a href=""><?php echo $product_name; ?></a></div>
                <div class="product-price"><p><?php echo number_format($price,0); ?>
                    <div class="icon-basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                    </p></div>

            </div>

        </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>