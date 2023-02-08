<?php
class OrderModel extends BaseModel{

    public function insertSaleOder($customerId,$firstname,$lastname,$shippingAdress,$phone,$base_price,$payment_menthod,$toltal_price,$shipping_cost,$cartId,$shipping_method){
            $sql = "INSERT INTO sale_order  (customer_id,customer_firstname,customer_lastname,shipping_address,phone,base_price,payment_method,total_price,shipping_cost,CART_ID,shipping_method,status)
                       VALUES (${customerId},'${firstname}','${lastname}','${shippingAdress}','${phone}',${base_price},${payment_menthod},${toltal_price},${shipping_cost},${cartId},'${shipping_method}',2)";

            $this->insertOrder($sql);

    }
    public function getOrderId(){
            $sql ="SELECT MAX(order_id) FROM sale_order ";
            $order = $this->QueryOneArray($sql);
            $orderId = $order['MAX(order_id)'];
            return $orderId;
    }
    public function insertOrderItem($order_id,$cartId){
        //lấy cart_item bằng cartId
        $cartItemData = $this->getCartItemsByCartId($cartId);
        //vòng lặp để lấy các idproduct, số lượng , giá có trong card_item để thêm vào order_item
        foreach($cartItemData as $item){
            $productId=$item['product_id'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            //insert vào bảng order_item
            $sql = "INSERT INTO order_item(order_id,price,quantity,product_id) VALUES (${order_id},${price},${quantity},${productId})";
            $this->insertOrder($sql);
        }

    }
    public function getCartItemsByCartId($cartId)
    {
        $sql = "SELECT * FROM  cart_item  WHERE cart_id = ${cartId}";
        return $this->getByQuery($sql);
    }
    // khi đã thanh toán thì update status của cart bằng 1
    public function updateStatusCart($cartId){
        $sql = "UPDATE cart SET STATUS = 1";
        $this->updateDataCart($sql);
    }

    //admin
    public function  getAll(){
        $sql = "SELECT * FROM sale_order";
        return $this->getByQuery($sql);
    }
    //xóa
    public function AdminDeleteOrder($tableOrderName,$idName,$id,$tableOrderItemName){
        $sql = "SELECT status FROM ${tableOrderName} WHERE ${idName} = ${id}";
        $status = $this->QueryOneArray($sql);

        if($status['status'] != 4){
            //xóa trong bảng order_item trước
            $sql1 ="DELETE FROM ${tableOrderItemName} WHERE ${idName} = ${id}";
            $this->QueryOneArray($sql1);
            //xóa trong bảng order
            $sql2 ="DELETE FROM ${tableOrderName} WHERE ${idName} = ${id} AND status != 4";
            $this->QueryOneArray($sql2);
        }else{
            echo "Không được xóa đơn hàng đã Thanh Toán "; die();
        }

    }

    //chi tiết order
    public function getById($id){
        $sql ="SELECT * FROM order_item WHERE order_id = ${id} ";
        return $this->getByQuery($sql);
    }
}