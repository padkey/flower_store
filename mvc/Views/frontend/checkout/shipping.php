<div class="container-checkout-shipping" id="shipping-page">
    <div class="box-info">
        <div class="title-shipping">
            <h1>Vui lòng nhập thông tin địa chỉ(Thông tin giao hàng)
                <span class="icon-letter">
                <i class="fa fa-envelope-o" aria-hidden="true" ></i>
            </span>
            </h1>
        </div>
        <div class="shipping-info">
            <div id="notification"></div>
            <div class="last-name">
                <label>Họ</label>
                <input type="text" name="shipping-lastname">
            </div>
            <div class="first-name">
                <label>Tên</label>
                <input type="text" name="shipping-firstname">
            </div>

            <div class="phone-number">
                <label>Số điện thoại</label>
                <input type="text" name="phone-number">
            </div>
            <div class="address">
                <label>Địa chỉ</label>
                <input type="text" name="shipping-address"></td>
            </div>
        </div>
        <div class="shipping-method">
            <label>Vui Lòng chọn phương thức Vận chuyển !</label>
            <br />
            <?php foreach ($shippingData as $shipping): ?>
            <input type="radio" name="shipping-method" data-cost="<?php echo $shipping['cost']; ?>"
                   value="<?php echo $shipping['id'];?>">
                <?php echo $shipping['name'];?> <br />
            <?php endforeach; ?>

        </div>
        <button class="next-step-shipping" id="step-shipping">Tiếp tục</button>
    </div>

</div>
