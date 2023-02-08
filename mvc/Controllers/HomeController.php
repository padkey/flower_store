<?php
class HomeController extends BaseController
{
    protected  $categoryModel;
    protected $productModel;
    public function __construct()
    {
        $this->LoadModel('CategoryModel');
        $this->loadModel('ProductModel');
        $this->categoryModel= new CategoryModel;
        $this->productModel = new  ProductModel;
    }

    public function index(){


        //lấy ra menu
       $categoriesMenu = $this->categoryModel->getCategoryForMenu();
//        //$categoryHome = $this->categoryModel->getCategoryPickHome();
        //lấy ra danh sách các product
        $Products = $this->productModel->getProForHome();
        //lấy ra danh sách product thuộc chủ đề category ngày sinh nhật
        $productsBirthday = $this->productModel->getByParentCategory();

//        $categories = $this->categoryModel->getAll();
        $this->view('frontend.home.index',
        [
            'categoryMenu' => $categoriesMenu,
            'Products'=>$Products,
            'productsBirthday'=>$productsBirthday,
        ]);

    }
}