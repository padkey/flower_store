<?php
class CustomerModel extends BaseModel{
    const TABLE_CUSTOMER = 'customer';
    const TABLE_CART = 'cart';
    public function insert($username,$password,$firstname,$lastname){
        $sql = "INSERT INTO ".self::TABLE_CUSTOMER." (username,password,customer_firstname,customer_lastname) VALUES ('${username}','${password}','${firstname}','${lastname}') ";

        return $this->insertData($sql);
    }
    public function login($username,$password){
            $sql = "SELECT * FROM customer WHERE username= '${username}' AND password='${password}'";

            $result = $this->QueryOneArray($sql);
            return $result;

    }
    public function select($username){
        $sql = "SELECT * FROM ".self::TABLE_CUSTOMER. " WHERE username = '${username}'";
        $result = $this->QueryOneArray($sql);
        return $result;
    }


    public function checkCart($customerId)
    {

        // kiem tra da có cart chua customer_id = $customerLoggin['customer_id'] and status=0
        $sql = "SELECT * FROM ".self::TABLE_CART." WHERE customer_id = ${$customerId} AND status = 0";
        $result = $this->getByQuery($sql);
        // kiem tra customer  đã có cart đang trong trạng thài chwua thanh toán chưa
        //nếu chưa có thì thêm mới
        if(empty($result)){
            $this->createCart($customerId);
        }

    }
    private function createCart($customerId)
    {
        //select ra thông tin của customer từ id để insert vào cart
        $customer = $this->selectCustomer($customerId);
        // sql insert 1 row có status bằng 0
        $sql = "INSERT INTO ".self::TABLE_CART." (customer_id,customer_firstname,customer_lastname,SHIPPING_ADDRESS,phone,status) 
        VALUES(${customer['customer_id']},'${customer['customer_firstname']}','${customer['customer_lastname']}','${customer['address']}','${customer['phone']}',0)";

        return $this->getByQuery($sql);
    }
    private function selectCustomer($customerId){
        $sql = "SELECT * FROM customer WHERE customer_id = ${$customerId}";
        //trả về một mảng kết hợp
        return $this->QueryOneArray($sql);
    }
    public function checkAdmin($customerId){
        $sql = "SELECT role FROM customer WHERE customer_id = ${customerId}";
        //trả về một mảng kết hợp
       $role = $this->QueryOneArray($sql);

        return $role['role'];
    }

    public function getAll(){
        $sql = "SELECT * FROM ".self::TABLE_CUSTOMER;
        return $this->getByQuery($sql);
    }
    //admin

}
?>