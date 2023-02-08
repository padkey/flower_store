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
        <div class="box-add">
            <a href="index.php?controller=productAdmin&action=addProduct">
                <div class="admin-add">
                    <h1>Thêm</h1>
                    <div class="icon-add"><p><i class="fa fa-plus-circle" aria-hidden="true"></i></p></div>
                </div>
            </a>
        </div>
        <table class="show">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Thumbnail</th>
                <th>Small Image</th>
                <th>Quantity</th>
                <th>Category ID</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($products as $product):
                $urlImg = 'pub/'.$product['thumbnail'];
                ?>

                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['product_description']; ?></td>
                    <td ><img width="50" height="50"  src="<?php echo $urlImg ?>" ></td>
                    <td><?php echo $product['small_image']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['category_id']; ?></td>
                    <td>
                        <div class="thaotac-admin">
                            <div class="modify">
                                <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>

                            <div class="delete">
                                <a href="index.php?controller=productAdmin&action=deleteProduct&id=<?php echo $product['product_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>


                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
