<div class="container-checkout-payment" id="payment-page">
    <div class="box-info">
        <h1><i class="fa fa-map-marker" aria-hidden="true" style="color:green;font-size:30px"></i>    Địa chỉ Nhận Hàng </h1>
        <div class="text-info">
            <p id="shipping-fullname">Nguyễn Xuân Lý</p>
            <p id="phone-number">0968658176</p>
            <p id="shipping-fulladdress">62 Thân Văn Nhiếp phường An Phú Quận 2 Thành Phố Hồ Chí Minh</p>
        </div>
    </div>


    <div class="box-checkout-payment">
        <div class="box-checkoutTwo">
            <div class="box-pro">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                    </tr>
                    <?php

                    //nếu products không rỗng thì mới foreach
                    if(!empty($products)):
                        foreach ($products as $product):
                            $urlImg = 'pub/'.$product['thumbnail'];


                            ?>
                            <tr>
                                <td class="border">
                                    <div class="cart-info">
                                        <img src="<?php echo $urlImg; ?>" >
                                        <div>
                                            <p><?php echo $product['product_name']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><p>Giá : <?php echo number_format($product['price'],0); ?> đ</p></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php echo number_format($product['price'] * $product['quantity'],0); ?> đ</td>

                            </tr>
                        <?php endforeach; endif;?>
                </table>
            </div>


        </div>


        <div class="payment_method">
            <p>Vui Lòng chọn phương thức thanh toán</p>
            <?php foreach ($paymentData as $payment): ?>
            <input type="radio" name="payment-method" value="<?php echo $payment['id']; ?>">
            <?php echo $payment['name']; ?>
            <br />
            <?php endforeach; ?>
        </div>

        <div class="tongtien">
            <table>
                <tr>
                    <td>Tổng tiền hàng </td>
                    <td id="base-price"><?php if(isset($baseprice)){echo number_format($baseprice,0); }  ?> đ</td>
                </tr>
                <tr>
                    <td>Phí vận chuyển </td>
                    <td id="money-shipping">30.000đ</td>
                    <input type="hidden" name="money_shipping" >
                </tr>
                <tr>
                    <td><b>Tổng thanh toán</b></td>
                    <td id="sum-payment">1.530.000đ</td>
                    <input type="hidden" name="sum_payment">
                </tr>
            </table>
        </div>
        <button type="submit" >Đặt hàng</button>
    </div>
</div>
