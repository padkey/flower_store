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
        <form action="index.php?controller=productAdmin&action=saveProduct" method="post" enctype="multipart/form-data">
            <div class="add-info-pro">
                <div class="title" id="tilte1">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="product_name">
                </div>
                <div class="title" >
                    <label >Giá</label>
                    <input class="l2" type="text" name="price">
                </div>

                <div class="title">
                    <label>Số lượng</label>
                    <input class="l3" type="text" name="quantity"></td>
                </div>
                <div class="title">
                    <label>Category</label>
                    <input class="l4" type="text" name="category_id"></td>
                </div>
                <div class="title">
                    <label>Nội Dung</label>
                    <textarea class="l5" name="product_description"> </textarea>
                </div>
                <div class="title">
                    <label>Hình ảnh</label>
                    <input class="l6" type="file" name="thumbnail">
                </div>
            </div>
            <div>
                <button type="submit">Thêm</button>
            </div>
        </form>
    </div>

</body>