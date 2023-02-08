<?php
class OrderAdminController extends BaseController {
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
        $this->orderModel = new OrderModel;
    }


    public function manageOrder(){
        $Orders = $this->orderModel->getAll();
        $this->view("admin.order.index",[
            'Orders'=>$Orders
        ]);
    }
    public function modifyOrder(){

    }
    public function deleteOrder(){
            $idName = "order_id";
            $tableOrderName ="sale_order";
            $orderId = $_GET['id'];
            $tableOrderItemName = "order_item";
            //Xóa Order
            $this->orderModel->AdminDeleteOrder($tableOrderName,$idName,$orderId,$tableOrderItemName);
            header('location:index.php?controller=OrderAdmin&action=manageOrder');
    }
    public function detailOrder(){
        $orderId = $_GET['id'];
        $detailOrders = $this->orderModel->getById($orderId);
        $this->view("admin.order.detail",[
            'detailOrders'=>$detailOrders
        ]);
    }
}