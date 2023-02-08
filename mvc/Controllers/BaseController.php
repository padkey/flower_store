<?php
class BaseController{
    const VIEW_FOLDER_NAME = 'Views';

    const MODEL_FOLDER_NAME = 'Models';
/* Descripttion :
    +path name :folderName .fileName
    +Lấy từ sau thưu mục View
*/

    /* vì bên controller muốn truyền dữ liệu qua đây nên ta thêm array data=[] rỗng */
    protected function view($viewPath, array $data=[]){

        /* đổi lí tự key thành biến $key */
    foreach ($data as $key => $value){
        $$key =$value;
    }

        /* str_replace thay thế kí tự . sang  / trong chuỗi $viewPath */
         $viewPath =
         /* Mỗi lần truyền ra thì truyền luôn cái mảng , không truyền cũng không sao vì mảng mặc định cho là rỗng rồi */
             require (self::VIEW_FOLDER_NAME . '/'.str_replace('.','/',$viewPath) .'.php');
    }
    protected function loadModel($modelPath){
        require(self::MODEL_FOLDER_NAME.'/'.$modelPath.'.php');
    }
}