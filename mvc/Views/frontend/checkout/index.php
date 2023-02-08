<!DOCTYPE html>
<html>
<head>
    <title>Menu dọc</title>
    <link href="./style.css" type="text/css" rel="stylesheet"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="pub/media/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php
$this->view("frontend.header");
?>

<form id ="myFrom" action="index.php?controller=order&action=store" method="POST">
    <input type="hidden" value="<?php echo $basePrice ?>" name="base-price">
    <input type="hidden"	value="<?php echo $cartId ?>" name="CartId">
<?php
$this->view('frontend.checkout.shipping',[
      'shippingData'=>  $shippingData,
]);
$this->view('frontend.checkout.payment',[
        'paymentData'=> $paymentData,
        'products'=>$products
]);
?>
</form>
<?php
$this->view("frontend.footer");
?>
<script type="text/javascript" src="pub/assets/checkout/js/checkout.js" > </script>
</body>
