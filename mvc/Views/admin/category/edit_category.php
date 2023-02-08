<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="./style.css" type="text/css" rel="stylesheet"/>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="./script.js" > </script>
    <link rel="stylesheet" href="pub/media/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php $this->view("admin.admin_header");?>
<div class="admin-box-add-pro">
    <div class="title-add-pro"><h1>Thêm Sản Phẩm Mới </h1></div>
    <form action="index.php?controller=categoryAdmin&action=saveCategory" method="post" enctype="multipart/form-data">
        <div class="box-add-info">
            <table>
                <tr>
                    <td>Tên Danh mục</td>
                    <td><input type="text" name="category_name"></td>
                </tr>
                <tr>
                    <td>Id Danh mục cha</td>
                    <td><input class="" type="text" name="parent_id"></td>
                </tr>

            </table>
        </div>

        <div>
            <button type="submit">Thêm</button>
        </div>
    </form>
</div>

</body>