<div class="container-pro-cart">

    <div class="box-table-cart">
        <div class = "box-pro">
            <form action="index.php?controller=cart&action=update" method="POST">
                <table class="product">
                    <tr class="title">
                        <th class="sanpham">SẢN PHẨM</th>
                        <th>ĐƠN GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TỔNG CỘNG </th>
                        <th class="thaotac"><li>Thao tác
                                <ul>
                                    <li>
                                        <a href="index.php?controller=cart&action=destroy">Xóa tất cả</a>
                                    </li>
                                    <li>
                                        <button type="submit">Cập nhật</button>
                                    </li>
                                </ul>
                            </li>
                        </th>

                    </tr>
                    <?php

                    //nếu products không rỗng thì mới foreach
                    if(!empty($products)):
                        foreach ($products as $product):
                            $urlImg = 'pub/'.$product['thumbnail'];


                            ?>
                            <tr>
                                <td >
                                    <div class="cart-info">
                                        <img src="<?php echo $urlImg; ?>" >
                                        <div>
                                            <p><?php echo $product['product_name']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><p>Giá : <?php echo number_format($product['price'],0); ?></p></td>

                                <td><input type="number" min="0"
                                           name="quantity[<?php // đặt tên như vậy ta có thể lấy được id của sản phẩm mới update và số lượng mới
                                           echo $product['product_id']; ?>]"
                                           value="<?php echo $product['quantity']; ?>"></td>

                                <td><?php echo number_format($product['price'] * $product['quantity'],0); ?></td>
                                <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product['product_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

                            </tr>
                        <?php endforeach; endif;?>
                </table>
        </div>



        <div class="tieptuc">
            <a href="index.php?controller=order&action=index">Tiếp tục</a>
        </div>

</form>

        <div class="tongtien">
            <table>
                <tr>
                    <td><b>Tổng Tiền</b></td>
                    <td><?php if(isset($basePrice)){echo number_format($basePrice,0);}else{
                        echo 0;
                        }  ?>  Đ</td>
                </tr>
            </table>
        </div>



    </div>

</div>