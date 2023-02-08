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
//header
$this->view('frontend.header');

$this->view ('frontend.categories.menu',[
    'categoryMenu'=>$categoryMenu,

]);
$this->view ('frontend.categories.detail',[
    'listProduct'=>$listProduct,

]);


//footer
$this->view('frontend.footer');
?>
</body>
