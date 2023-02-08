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
$this->view('frontend.header');
if(isset($_SESSION['customer_id'])){
    $this->view('frontend.cart.list',[
        'products'=>$products,
        'basePrice' => $basePrice,
    ]);
}else{
    $this->view('frontend.cart.list');
}

$this->view('frontend.footer');
?>

</body>