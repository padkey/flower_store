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
<?php $this->view("admin.admin_header");
if(isset($subjects)){
    $this->view("admin.category.menu_subject",[
        'subjects' => $subjects
    ]);
}
elseif (isset($flowerTypes)){
    $this->view("admin.category.menu_flower_type",[
        'flowerTypes' => $flowerTypes
    ]);
}
elseif (isset($proDifferents)){
    $this->view("admin.category.menu_pro_different",[
        'proDifferents' => $proDifferents
    ]);
}
elseif (isset($birthdays)){
    $this->view("admin.category.menu_birthday",[
        'birthdays' => $birthdays
    ]);
}
elseif (isset($parents)){
    $this->view("admin.category.menu_parent",[
        'parents' => $parents
    ]);
}
elseif (isset($childs)){
    $this->view("admin.category.menu_child",[
        'childs' => $childs
    ]);
}
?>

</body>
