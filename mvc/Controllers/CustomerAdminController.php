<?php
class CustomerAdminController extends BaseController {
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

    public function managecustomer(){
        $customers = $this->customerModel->getAll();
        $this->view("admin.customer.index",[
            'customers'=>$customers
        ]);

    }
    public function editCustomer(){
        $id = $_GET['id'];
        $this->customerModel->adminDeleteCustomer($id);
        header('location:index.php?controller=customerAdmin&action=managecustomer');
    }


}