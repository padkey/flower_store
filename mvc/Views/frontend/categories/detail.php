<html>
<head>
    <title>Home</title>
    <link href="./././style.css" type="text/css" rel="stylesheet"/>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="./script.js" > </script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>



<div class="containerCategoryDetail">
    <div class="box-pro-home">

            <?php
            //kiểm tra xem có sản phẩm trong danh sách không, không có thì trả ra câu KHÔNG CÓ SẢN PHẢM
            if(!empty($listProduct)):
            foreach($listProduct as $product):
                $product_name =$product['product_name'];
                $price = $product['price'];
                $urlImage= 'pub/'.$product['thumbnail'];

                //đường dẫn mặc đinh
                $rootUrl = "/flower_store/mvc/index.php";
                //đường dẫn tới productDetail
                $urlProductDetail =$rootUrl."?controller=product&action=show&id=".$product['product_id'];
            ?>
        <a href="<?php echo $urlProductDetail; ?>">
            <div class="item-pro-home">
                <div class="box-img-pro-home">
                    <img src="<?php echo $urlImage; ?>"/>
                </div>
                <div class="product-text">
                    <div class="product-name"><a href=""><?php echo $product_name; ?></a></div>
                    <div class="product-price"><p><?php echo $price; ?>
                        <div class="icon-basket"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
                        </p></div>

                </div>

            </div>
        </a>

        <?php endforeach; ?>

        <?php else: ?>
            <p style="font-size: 50px;padding-top: 50px ">Không có sản phẩm</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
