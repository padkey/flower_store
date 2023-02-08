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
<div class="container-register">
    <div class="box-register">
        <form action="<?php echo $actionRegister ?>" method="post">
            <table>
                <tr>
                    <div class="title-register"><h1>Tạo tài khoản</h1></div>
                    <div style="text-align: center;color: #a52834"><?php if(isset($alert)){
                        echo $alert;
                        }?></div>
                    <td><input type="text"  name="username" placeholder="Tài Khoản"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Mật Khẩu"></td>
                </tr>
                <tr>

                    <td><input type="password" name="repeatpassword" placeholder="Nhập lại mật khẩu"></td>
                </tr>
                <tr>

                    <td><input type="text" name="firstname" placeholder="Tên"></td>
                </tr>
                <tr>

                    <td><input type="text" name="lastname" placeholder="Họ"></td>
                </tr>

                <tr >
                    <td class="submit"><input type="submit" name="btn_submit" value="Đăng ký tài khoản"></td>
                </tr>

            </table>

        </form>
    </div>
</div>
<?php
$this->view('frontend.footer');
?>
</body>