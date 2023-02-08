<div class="containerMenuAdmin">
    <div class="headerMenuAdmin">
        <nav class="menu">

            <ul class="root">

                <li><a href="../mvc/Views/admin/category/index.php?controller=Customeradmin&action=managecustomer"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        Quản lý tài khoản </a>   </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Productadmin&action=manageproduct"><i class="fa fa-bar-chart" aria-hidden="true"></i>Quản lý sản phẩm </a>

                </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Categoryadmin&action=managesubject"><i class="fa fa-th-large" aria-hidden="true"></i>Quản lý chủ đề </a>

                </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Categoryadmin&action=managetFlowerType"><i class="fa fa-gratipay" aria-hidden="true"></i>Quản Lý loại Hoa </a>
                </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Categoryadmin&action=manageBirthday"><i class="fa fa-birthday-cake" aria-hidden="true"></i>Quản Lý Ngày Sinh Nhật </a>
                </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Categoryadmin&action=manageProDifferent"><i class="fa fa-suitcase" aria-hidden="true"></i>Quản Lý loại Sản phẩm khác </a>
                </li>
                <li><a href="../mvc/Views/admin/category/index.php?controller=Orderadmin&action=manageOrder"><i class="fa fa-stack-overflow" aria-hidden="true"></i>Quản Lý Đơn hàng </a>
                </li>
            </ul>
        </nav>

    </div>
    <div class="box-show-all">
        <table class="show">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ParentID</th>
                <th>icon</th>
                <th>Thao Tác</th>
            </tr>
            <?php foreach ($proDifferents as $proDifferent): ?>

                <tr>
                    <td><?php echo $proDifferent['category_id']; ?></td>
                    <td><?php echo $proDifferent['category_name']; ?></td>
                    <td><?php echo $proDifferent['parent_id']; ?></td>
                    <td><?php echo $proDifferent['icon']; ?></td>
                    <td>
                        <div class="thaotac-admin">
                            <div class="modify">
                                <a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            </div>

                            <div class="delete">
                                <a href="../mvc/Views/admin/category/index.php?controller=CategoryAdmin&action=deleteProDifferent&id=<?php echo $proDifferent['category_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </div>


                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
