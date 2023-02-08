<html>
<head>
    <title>Home</title>
    <link href="./././style.css" type="text/css" rel="stylesheet"/>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="./script.js" > </script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>


<div class="containerMenuCategoryDetail">
    <div class="headerMenuCategoryDetail">
        <nav class="menu">
            <ul class="root">
                <?php foreach ($categoryMenu as $parent):
                    //lấy name parent
                    $nameParentCategory =$parent['category_name'];
                //lấy list_child
                    $listChild = $parent['list_child'];
                    //đường dẫn mặc định để tới catedetail
                $rootUrl ="/flower_store/mvc/index.php";


                ?>
                <li><a href="">
                        <?php echo $nameParentCategory; ?> </a>
                    <ul class="sub">
                        <?php
                        //lặp để lấy ra từng phần tử của list_child . list_child là danh sách con vd : rê chuột vào ngày sinh nhật sẽ hiện ra bạn bè  người yêu mẹ bố ...
                        foreach($listChild as $child):
                        $nameChildCategory = $child['category_name'];
                            //đường dẫn tới categoryDetail con
                            $url = $rootUrl."?controller=category&action=show&id=".$child['category_id'];
                        ?>
                        <li><a href="<?php echo $url; ?>"><?php echo $nameChildCategory; ?> </a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
</body>
</html>