<?php
class CartController extends BaseController {
    private $productModel;
    protected $cartModel;
    //public $cartItemModel;
    public function __construct()
    {
        $this->loadModel('ProductModel');
        $this->productModel = new ProductModel;
        $this->loadModel('CartModel');
        $this->cartModel = new CartModel;
    }

    public function index()
    {
        //lấy cart id của customer
        if (isset($_SESSION['customer_id'])) {
            $customerId = $_SESSION['customer_id'];
            //lấy carid của customer
            $cartId = $this->cartModel->getByCustomerId($_SESSION['customer_id']);

            //select tất cả product bằng với product_id trong bảng cart_item và cart_id của cart_item phải bằng với cart_id của cart
            $products = $this->productModel->getByCartItem($cartId);
            //cập nhật tổng giá cho cart
           $basePrice = $this->cartModel->updateBasePrice($cartId);
            $this->view('frontend.cart.index', [
                'products' => $products,
                'cartId' => $cartId,
                'customerId'=> $customerId,
                'basePrice' => $basePrice
            ]);
        }
        else{
            $this->view('frontend.cart.index');
        }
    }
    public function addProductToCart(){
        // Kiem tra customer loggin nếu chưa thì chuyển sang trang loggin
        if(!isset($_SESSION['customer_id']))
        {
            header('location:index.php?controller=customer&action=login_page');
        }
        else{
            $quantity = $_POST['quantity'];
            $productId = $_POST['product_id'];
            $customerId = $_SESSION['customer_id'];
            $price = $_POST['price'];
            $this->cartModel->checkCartExist($customerId);

            $this->cartModel->addProductToCart($productId,$quantity,$customerId,$price);

            //mỗi lần mua xong ta chuyển trang đén giỏ hàng
            header('location:index.php?controller=cart&index');
        }

    }


    public function delete(){
        //lấy id của product
        $productId = $_GET['id'];
        //xóa một phần tử trong array có id bằng $productId
        $cart = $this->cartModel->deleteByProductId($productId);

        //khi xóa xong sẽ quay trở lại chính trang danh sách trong giỏ hàng đó
        header('location:index.php?controller=cart&index');
    }


    public function update(){

        /*foreach ($cartItemData as $item){
            //nếu đã product đó rồi thì tăng quantity lên
            if ($item['product_id'] == $productId)
            {
                $item['quantity'] =  $item['quantity'] + $quantity;
                $newProduct = 1;
                $this->cartItemModel->updateQuantity($productId,$item['quantity'],$cartId);
            }
        }*/

        foreach ($_POST['quantity'] as $productId => $quantity){

            //echo $productId. '->' .$qty;
            //nếu số lượng bằng 0 thì xóa sản phẩm đó đi
            if($quantity == 0){
                unset($_SESSION['cart'][$productId]);
            }
            else{
                //lấy cart id của customer
                $cartId = $this->cartModel->getByCustomerId($_SESSION['customer_id']);
                //nhật nhật lại số lượng
                $this->cartModel->updateQty($productId,$quantity,$cartId);

            }

        }
        //mỗi lần update xong ta quay lại chính trang danh sách đó
        header('location:index.php?controller=cart&index');
    }


    //xóa tất cả
    public function destroy(){
        //lấy cart id của customer hiện tại
        $cartId = $this->cartModel->getByCustomerId($_SESSION['customer_id']);
        $cart_item = $this->cartModel->destroy($cartId);
        //khi xóa xong sẽ quay trở lại chính trang danh sách trong giỏ hàng đó
        header('location:index.php?controller=cart&index');
    }





    /*  //hiện ra sản phẩm có trong giỏ
  public function indexx(){
  // nếu có $_SESSION['cart'] thì cho product bằng nó không thì cho bằng NULL nếu không sẽ bị lỗi không tồn tại $_SESSION['cart']
      $products = $_SESSION['cart'] ?? NULL;
      $this->view('frontend.cart.index',[
          'products'=>$products
      ]);
  }*/
    /* // khi thêm sản phẩm thì nó chạy ào store
    public function storee(){
        $productId = $_GET['id'];

       $product= $this->productModel->findById($productId);
        //hủy sesion
        //session_destroy();


       //khởi tạo giỏ hàng là cái session chứa dữ liệu của product và có key bằng với id của product
       // $_SESSION['cart'][$productId] = $product;

        //hàm array_key_exists là hàm kiểm tra Id của product có phải là key của $_SESSION['cart'] hay không
        //khi mà ta muốn thêm vào giỏ hàng cái sản phẩm đó nữa thì ta phải kiểm tra là sản sản đã có trong giỏ hàng hay chưa

        // nếu $_sesstion['cart] rỗng và không tồn tại hoặc là sản phẩm ta đang muốn thêm chưa có trong giỏ
        if(empty($_SESSION['cart']) || !array_key_exists($productId,$_SESSION['cart'])){
            //gọi đến mảng product và thêm trường số lượng là quantity =1
            $product['quantity']=1;
            //ta thêm sản vào trong giở bằng cách
            $_SESSION['cart'][$productId]= $product;
            echo "Sản phẩm CHƯA đã có trong giỏ hàng";
        }else{
           // echo "Sản phẩm ĐÃ có trong giỏ hàng";
            //nếu sản phẩm đã có trong giỏ hàng thì ta tăng số lượng lên 1
            $product['quantity'] = $_SESSION['cart'][$productId]['quantity'] + 1;
            $_SESSION['cart'][$productId] = $product;
        }
       //echo '<pre>';print_r($_SESSION['cart']); die();
        //mỗi lần mua xong ta chuyển trang đén giỏ hàng
        header('location:index.php?controller=cart&index');
    }*/
    /*   //Update số lượng cho sản phẩm trong giỏ hàng
    public function updatee(){

        foreach ($_POST['quantity'] as $productId=>$quantity){
            //echo $productId. '->' .$qty;
            //nếu số lượng bằng 0 thì xóa sản phẩm đó đi
            if($quantity == 0){
                unset($_SESSION['cart'][$productId]);
            }
            else{
                //nhật nhật lại số lượng
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }

        }
        //mỗi lần update xong ta quay lại chính trang danh sách đó
        header('location:index.php?controller=cart&index');
    }*/
    /*  public function deletee(){
        //lấy id của product
        $productId = $_GET['id'];
        //xóa một phần tử trong array có id bằng $productId
        unset($_SESSION['cart'][$productId]);

        //khi xóa xong sẽ quay trở lại chính trang danh sách trong giỏ hàng đó
        header('location:index.php?controller=cart&index');
    }*/
}