<div class="containerMenuAdmin">
    <div class="headerMenuAdmin">
        <nav class="menu">

            <ul class="root">

                <li><a href="index.php?controller=Customeradmin&action=managecustomer"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        Quản lý tài khoản </a>   </li>
                <li><a href="index.php?controller=Productadmin&action=manageproduct"><i class="fa fa-bar-chart" aria-hidden="true"></i>Quản lý sản phẩm </a>

                </li>
                <li><a href="index.php?controller=Categoryadmin&action=manageCategoryParent"><i class="fa fa-th-large" aria-hidden="true"></i>Quản Lý Danh mục cha </a>
                </li>
                <li><a href="index.php?controller=Categoryadmin&action=manageCategoryChild"><i class="fa fa-indent" aria-hidden="true"></i></i>Quản Lý Danh mục con </a>
                </li>
                <li><a href="index.php?controller=Orderadmin&action=manageOrder"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Quản Lý Đơn hàng </a>
                </li>

            </ul>
        </nav>

    </div>
    <div class="box-show-all">
        <table class="show">
            <tr>
                <th>ID</th>
                <th>CustomerId</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Shipping Adress</th>
                <th>Phone</th>
                <th>Base Price</th>
                <th>Payment Method</th>
                <th>Toltal Price</th>
                <th>Shipping Cost</th>
                <th>CartID</th>
                <th>Shipping Method</th>
                <th>Status</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($Orders as $Order): ?>

                <tr>
                    <td><?php echo $Order['order_id']; ?></td>
                    <td><?php echo $Order['customer_id']; ?></td>
                    <td><?php echo $Order['customer_firstname']; ?></td>
                    <td><?php echo $Order['customer_lastname']; ?></td>
                    <td><?php echo $Order['shipping_address']; ?></td>
                    <td><?php echo $Order['phone']; ?></td>
                    <td><?php echo $Order['base_price']; ?></td>
                    <td><?php echo $Order['payment_method']; ?></td>
                    <td><?php echo $Order['total_price']; ?></td>
                    <td><?php echo $Order['shipping_cost']; ?></td>
                    <td><?php echo $Order['cart_id']; ?></td>
                    <td><?php echo $Order['shipping_method']; ?></td>
                    <td><?php echo $Order['status']; ?> </td>
                    <td>
                        <div class="thaotac-admin">
                            <div class="modify">
                                <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>

                            <div class="delete">
                                <a href="index.php?controller=Orderadmin&action=deleteOrder&id=<?php echo $Order['order_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>
                            <div class ="detail_order">
                                <a href="index.php?controller=Orderadmin&action=detailOrder&id=<?php echo $Order['order_id']?>">Chi tiết </a>
                            </div>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
