<div class="container-pro-related">

    <div class="box-pro-related">
        <div class="box-title">
            <div class="box-text">Sản phẩm liên quan</div>
        </div>
        <?php foreach($productsRelated as $product):
                    //đường dẫn tới file chwuas hình ảnh
                    $urlImg = 'pub/'.$product['thumbnail'];
                     //tên product
                    $name = $product['product_name'];
                    //giá product
                    $price = $product['price'];

                    $url ="?controller=product&action=show&id=".$product['product_id'];

        ?>
        <div class="item-pro-detail">
            <div class="box-img-pro-detail">
                <a href="<?php echo $url; ?>"><img src="<?php echo $urlImg ?>"></a>
            </div>
            <div class="product-text">
                <div class="product-name"><a href=""><?php echo $name ?></a></div>
                <div class="product-price"><p><?php echo $price ?>
                    <div class="icon-basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                    </p></div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>


