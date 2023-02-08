<?php
class HomeAdminController extends BaseController {
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

    public function index(){
        $this->view("admin.home.index");
    }


}