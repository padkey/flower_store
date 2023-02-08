<!DOCTYPE html>
<html>
<head>
    <title>Menu dọc</title>
    <link href="./style.css" type="text/css" rel="stylesheet"/>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="./script.js" > </script>
    <link rel="stylesheet" href="pub/media/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php
$this->view("frontend.header");

$this->view("frontend.home.menu_slide",[
        'categoryMenu' => $categoryMenu,
    ]);
//show các sản phẩm
$this->view("frontend.home.show_product",[
    'Products'=>$Products,
    'productsBirthday'=>$productsBirthday,
]);
$this->view("frontend.footer");
?>
</body>


