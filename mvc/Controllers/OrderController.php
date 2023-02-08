<?php
class OrderController extends BaseController{
    protected $cartModel;
    protected $customerModel;
    protected $shippingModel;
    protected $paymentModel;
    protected $orderModel;
    protected $productModel;
    public function __construct(){
        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
        $this->loadModel('CustomerModel');
        $this->customerModel = new CustomerModel;
        $this->loadModel('ShippingModel');
        $this->shippingModel = new ShippingModel;
        $this->loadModel('PaymentModel');
        $this->paymentModel = new PaymentModel;
        $this->loadModel('OrderModel');
        $this->orderModel = new OrderModel;
        $this->loadModel('ProductModel');
        $this->productModel= new ProductModel;
    }

    //thêm order vào database
    public function index(){

        //echo $_SESSION['customer_id']; die();
        if(isset($_SESSION['customer_id'])){
                $customerId = $_SESSION['customer_id'];
                //lấy cartId của customer
                $cartId = $this->cartModel->getByCustomerId($customerId);
                //lấy ra tổng giá
                $basePrice = $this->cartModel->basePrice($cartId);
                //lấy ra phương thức vận chuyển
            $shippingData = $this->shippingModel->getAll();
                //lấy ra phương thức thanh toán
            $paymentData = $this->paymentModel->getAll();
            //lấy ra tất cả sản phẩm
            $products = $this->productModel->getByCartItem($cartId);
            // truyền ra view để hiển thị
            $this->view('frontend.checkout.index', [
                    'cartId' => $cartId,
                    'basePrice' => $basePrice,
                    'shippingData' => $shippingData,
                    'paymentData'=>$paymentData,
                    'products' =>$products
                ]
            );
        }



    }
    public function store(){

        $customerId= $_SESSION['customer_id'];
        //
        $firstname = $_POST['shipping-firstname'];
        $lastname = $_POST['shipping-lastname'];
        $shippingAdress = $_POST['shipping-address'];
        $phone = $_POST['phone-number'];
        $base_price=$_POST['base-price'];
        $payment_menthod = $_POST['payment-method'];
        $toltal_price = $_POST['sum_payment'];
        $shipping_cost = $_POST['money_shipping'];
        $cartId= $_POST['CartId'];
        $shipping_method = $_POST['shipping-method'];
        //insert dữ liệu vào bảng sale_order
        $this->orderModel->insertSaleOder($customerId,$firstname,$lastname,$shippingAdress,$phone,$base_price,$payment_menthod,$toltal_price,$shipping_cost,$cartId,$shipping_method);
        //lấy order_id bằng cách lấy order_id lơn nhất
        $order_id = $this->orderModel->getOrderId();
        // insert vào bảng order_item
        $this->orderModel->insertOrderItem($order_id,$cartId);
        //update trạng thài cart bằng 1 là đã thanh toán
        $this->orderModel->updateStatusCart($cartId);
        //
       // $this->cartModel->checkLogginCustomer($customerId);
        //trả về màn hình thông báo thành công
        $this->view('frontend.checkout.success');
    }
}