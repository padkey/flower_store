<?php
class ProductAdminController extends BaseController {
    protected $categoryModel;
    protected $productModel;
    protected $orderModel;
    protected $customerModel;
    public function __construct()
    {
        $this->loadModel('CustomerModel');
        $this->loadModel('ProductModel');
        $this->loadModel('OrderModel');
        $this->loadModel('CategoryModel');

        $this->customerModel = new CustomerModel;
        $this->productModel = new ProductModel;
        $this->categoryModel = new CategoryModel;
        $this->customerModel = new CustomerModel;
    }



    public function manageproduct(){
        $products = $this->productModel->getAll();
        $this->view("admin.product.index",[
            'products'=>$products
        ]);
    }
    public function deleteProduct(){
        $id = $_GET['id'];
        $tableName = "product";
        $idName ="product_id";
        $this->productModel->AdminDelete($tableName,$idName,$id);
        header('location:index.php?controller=ProductAdmin&action=manageproduct');
    }
    public function addProduct(){
        $this->view("admin.product.edit_product");
    }
    public function saveProduct(){
            $name = $_POST['product_name'];
            $price =$_POST['price'];
            $quantity =$_POST['quantity'];
            $categoryId =$_POST['category_id'];
            $description = $_POST['product_description'];
            $imgName = $this->vn_to_str($name);
            $saveThumbnail = "pub/media/product/".$imgName.".jpg";
        $thumbnail = "media/product/".$imgName.".jpg";
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $saveThumbnail)) {
            echo "THÀNH CÔNG.\n";
        } else {
            echo "Upload failed";
        }
        $this->productModel->saveProduct($name,$price,$quantity,$categoryId,$description,$thumbnail);
        header('location:index.php?controller=productAdmin&action=manageproduct');
    }

   public function vn_to_str ($str){

        $unicode = array(

            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd'=>'đ',

            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i'=>'í|ì|ỉ|ĩ|ị',

            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D'=>'Đ',

            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach($unicode as $nonUnicode=>$uni){

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);

        }
        $str = str_replace(' ','_',$str);

        return $str;
    }
}