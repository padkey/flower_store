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
?>
<div class="container-login">
    <div class="box-login">
        <form action="<?= $actionlogin ?>" method="POST">
            <table>
                <div class="title-login">Đăng nhập</div>
                <tr>
                    <div style="text-align: center; color: #a52834"><?php
                        if(isset($alert)){
                            echo $alert;
                        }
                        ?></div>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Tài Khoản" name="username"></td>
                </tr>
                <tr>
                    <td><input type="password" placeholder="Mật khẩu" name="password"></td>
                </tr>
                <tr>
                    <td class="submit"><input type="submit" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
$this->view('frontend.footer');
?>
</body>


