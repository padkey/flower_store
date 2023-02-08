<?php
class CategoryController extends BaseController {
    private $categoryModel;
    private $productModel;
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel =new CategoryModel;
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
    }

    public function index(){
        $pageTitle ='Danh sách sản phẩn theo dạnh mục : Laptop';
        $categories = $this->categoryModel->getAll(['*'],[
            'column'=>'category_name',
           // 'order'=>'asc'
        ]);
        /* xài dấu chấm thay dấu / để quen cách viets của laravel */
       return $this->view('frontend.categories.index',['categories' => $categories,'pageTitle' => $pageTitle ]);
    }
    public function store(){

        echo __METHOD__;
    }
    public function update(){
        //lấy id bằng $_GET
        $id = $_GET['id'];
        $data = [
            'category_id'=>2,
            'category_name'=>'Chúc Mừng',

        ];
        $this->categoryModel->updateData($id,$data);
    }
    public function delete(){
        $id = $_GET['id'];
        $this->categoryModel->destroy($id);
    }
    public function show(){
        if(isset($_POST['product_name'])){
            $productName = $_POST['product_name'];
            // lấy danh sách tất cả product qua product_name
            $listProduct = $this->productModel->search($productName);
            //lấy danh sách menu
            $categoriesMenu = $this->categoryModel->getCategoryForMenu();

            $this->view('frontend.categories.index',[
                'categoryMenu' => $categoriesMenu,
                'listProduct'=>$listProduct,
            ]);
        }
        else{
    $categoryId = $_GET['id'];
    //lấy ra danh sách category
    $categoriesMenu = $this->categoryModel->getCategoryForMenu();

    // lấy danh sách tất cả product qua categpryID
    $listProduct = $this->categoryModel->getAllProductByCategoryId($categoryId);
    $this->view('frontend.categories.index',[
        'categoryMenu' => $categoriesMenu,

        'listProduct'=>$listProduct,
    ]);
}
    }



}
?>