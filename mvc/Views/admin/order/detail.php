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
<div class="containerMenuAdmin">
    <div class="return-order"><a href="index.php?controller=orderAdmin&action=manageOrder">Trở về</a></div>
    <div class="box-show-all">
        <table class="show">
            <tr>
                <th>ID</th>
                <th>OrderId</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Product_id</th>

            </tr>
            <?php foreach ($detailOrders as $detailOrder): ?>

                <tr>
                    <td><?php echo $detailOrder['order_item_id']; ?></td>
                    <td><?php echo $detailOrder['order_id']; ?></td>
                    <td><?php echo $detailOrder['price']; ?></td>
                    <td><?php echo $detailOrder['quantity']; ?></td>
                    <td><?php echo $detailOrder['product_id']; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>