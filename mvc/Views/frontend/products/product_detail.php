<div class="container-pro-detail">
    <div class="box-pro-detail">
        <?php

        $urlImg = 'pub/' .$products['thumbnail'];
        $nameProduct = $products['product_name'];
        $productId = $products['product_id'];
        $price_product = $products['price'];
        $description = $products['product_description'];

        $listSmallImg = explode('|', $products['small_image']);

        ?>
        <div class="row">
            <div class="col-2">

                <img id="ProductImg" src="<?php echo $urlImg; ?>" width="500px">
                <div class="small-img-row">
                    <?php foreach ($listSmallImg as $img):

                        $smallImg = 'pub/'.$img;

                        ?>
                        <div class="small-img-col">
                            <img src="<?php echo $smallImg;?>" width="100%" class="small-img">
                        </div>
                    <?php endforeach;?>

                </div>
            </div>
            <div class="col-2">
                <h1><?php echo $nameProduct; ?> </h1>
                <p>Home/ Flower</p>
                <h4><?php echo number_format($price_product,0); ?> </h4>
                <form action="index.php?controller=cart&action=addProductToCart" method="post">
                    <input type="number" name="quantity" value="1" min = 1>
                    <input type="hidden" name="price" value="<?php echo $price_product ?>">
                    <input type="hidden" name="product_id" value="<?php echo $productId ?>">
                    <button type="submit">Thêm vào giỏ hàng</button>
                </form>
                <h2><?php echo $description; ?></h2>
            </div>
        </div>

    </div>
</div>





<script>
    var ProductImg= document.getElementById("ProductImg");
    var SmallImg= document.getElementsByClassName("small-img");

    SmallImg[0].onclick = function (){
        ProductImg.src =SmallImg[0].src;
    }
    SmallImg[1].onclick = function (){
        ProductImg.src =SmallImg[1].src;
    }
    SmallImg[2].onclick = function (){
        ProductImg.src =SmallImg[2].src;
    }
    SmallImg[3].onclick = function (){
        ProductImg.src =SmallImg[3].src;
    }
</script>

