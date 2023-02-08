<?php
class CartModel extends BaseModel{
    const TABLE_CART = 'cart';
    const TABLE_CART_ITEM = 'cart_item';
    protected $cartItemModel;

    public function __construct()
    {
        $this->loadModel('CartItemModel');
        $this->cartItemModel = new CartItemModel();
    }
    public function getByCustomerId($customerId){
        $this->checkCartExist($customerId);
        $sql = "SELECT cart_id FROM ".self::TABLE_CART." WHERE customer_id = ${customerId} and status = 0";
        $result = $this->QueryOneArray($sql);
        return $result['cart_id'];
    }
    public function addProductToCart($productId,$quantity,$customerId,$price){
        // Lấy cart_id dựa vào customerID
        $sql = "SELECT * FROM ".self::TABLE_CART." WHERE customer_id = ${customerId} and status = 0";
        $result = $this->getByQuery($sql);
        // nếu customer không có cart thì

        if(!empty($result))
        {
            //trỏ về phần tử đầu
            $cartId = reset($result)['cart_id'];
            //lấy cart_item bằng cartId
            $cartItemData = $this->cartItemModel->getCartItemsByCartId($cartId);

            // Kiểm tra đã có product cần thêm chưa chưa, có rồi thì tăng quantity lên  , chưa thì thêm mới product
            $newProduct = 0; // kiểm tra đã có trong cart chưa .... 0: chưa | 1 : có
            $newData = [];
            foreach ($cartItemData as $item){
                //nếu đã product đó rồi thì tăng quantity lên
                if ($item['product_id'] == $productId)
                {
                    $item['quantity'] =  $item['quantity'] + $quantity;
                    $newProduct = 1;
                   $this->cartItemModel->updateQuantity($productId,$item['quantity'],$cartId);
                }
            }
            //nếu trong giỏ hàng chưa có product muốn thêm thì insert product mới vào
            if($newProduct == 0)
            {
                $this->cartItemModel->insert($productId,$quantity,$cartId,$price);
            }
        }


    }

// kiểu tra customer có cart chưa ... chưa có thì thêm mới
    public function checkCartExist($customerId)
    {
        // kiem tra da có cart chua customer_id = $customerLoggin['customer_id'] and status=0
        $sql = "SELECT * FROM ".self::TABLE_CART." WHERE customer_id = ${customerId} AND status = 0";

        $result = $this->getByQuery($sql);
        // kiem tra customer  đã có cart đang trong trạng thài chwua thanh toán chưa
        //nếu chưa có thì thêm mới
        if(empty($result)){
            $this->createCart($customerId);
        }

    }
    public function createCart($customerId)
    {
        //select ra thông tin của customer từ id để insert vào cart
        $customer = $this->selectCustomer($customerId);
        // sql insert 1 row có status bằng 0
        $sql = "INSERT INTO ".self::TABLE_CART." (customer_id,customer_firstname,customer_lastname,SHIPPING_ADDRESS,phone,status) 
        VALUES(${customer['customer_id']},'${customer['customer_firstname']}','${customer['customer_lastname']}','${customer['address']}','${customer['phone']}',0)";

        return $this->getByQuery($sql);
    }
    private function selectCustomer($customerLoggin){
        $sql = "SELECT * FROM customer WHERE customer_id = ${customerLoggin}";
        //trả về một mảng kết hợp
        return $this->QueryOneArray($sql);
    }
    public function deleteByProductId($productId){
        $sql = "DELETE FROM cart_item WHERE product_id = ${productId}";
        return $this->getByQuery($sql);
    }


    // Cập nhật số lượng
    public function updateQty($productId,$quantity,$cartId)
    {
       return $this->cartItemModel->updateQuantity($productId,$quantity,$cartId);

    }
    //xóa tất cả các item hiện tại trong giỏ hàng
    public function  destroy($cartId){
        $this->cartItemModel->destroy($cartId);
    }
    //cập nhật tổng giá cho cart
    public function updateBasePrice($cartId){
        //select all cart_item
        $cartItem = $this->cartItemModel->getCartItemsByCartId($cartId);
        $basePrice = 0;
        foreach ($cartItem as $price){
            $basePrice += $price['price'] * $price['quantity'];
        }
        //update vào bảng Cart giá trị BASE_PRICE
        $sql = "UPDATE  ".self::TABLE_CART." SET BASE_PRICE = ${basePrice}";
        $this->updateDataCart($sql);

        // trả về tổng
        return $basePrice;

    }
    //select tổng giá
    public function basePrice($cartId){
        $sql = "SELECT * FROM ".self::TABLE_CART." WHERE cart_id=${cartId}";

        $cart = $this->QueryOneArray($sql);

        return $cart['BASE_PRICE'];
    }

}