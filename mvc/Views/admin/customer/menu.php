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
                <th>Customer_id</th>
                <th>username</th>
                <th>password</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>Adress</th>
                <th>phone</th>
                <th>create_at</th>
                <th>quyen</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($customers as $customer): ?>

            <tr>
                <td><?php echo $customer['customer_id']; ?></td>
                <td><?php echo $customer['username']; ?></td>
                <td><?php echo $customer['password']; ?></td>
                <td><?php echo $customer['customer_firstname']; ?></td>
                <td><?php echo $customer['customer_lastname']; ?></td>
                <td><?php echo $customer['address']; ?></td>
                <td><?php echo $customer['phone']; ?></td>
                <td><?php echo $customer['create_at']; ?></td>
                <td><?php echo $customer['role']; ?></td>
                <td>
                    <div class="thaotac-admin">
                        <div class="modify">
                            <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </div>



                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
