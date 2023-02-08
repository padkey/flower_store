<?php
// tất cả các controller đều đi qua index.php nên khởi tạo session ở đây
session_start();
require "./Controllers/BaseController.php";
require "./Core/Database.php";
require "./Models/BaseModel.php";

/* $_REQUEST['controller'] là nếu tồn tại yêu cầu của người dùng là controller thì sẽ lấy ra cái  name route của controller đó */
/* vì chữ cái đầu tiên luôn là chữ hoa nên  ta dùng ucfirst để chuyển chữ cái đầu tiên thành chữ hoa , strtolower chuyển hết thành chữ thường */
/* mặc định không ghi controller thì trả về controller = home */
$controllerName= ucfirst(strtolower($_REQUEST['controller'] ?? 'Home')) .'Controller';
/* tên action luôn là chữ thường */
/* khi muốn gọi các hàm trong class controller thì dùng action */
/* nếu không tồn tại action trên đường dẫn thì cho action=index */
if(isset($_REQUEST['action'])) {
    $actionName = $_REQUEST['action'];
}else{
    $actionName = 'index';
}

require "./Controllers/${controllerName}.php";
    $controllerObject= new $controllerName;
    $controllerObject->$actionName();


