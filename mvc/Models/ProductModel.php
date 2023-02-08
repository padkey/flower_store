<?php
class ProductModel extends BaseModel
{
    const TABLE_PRODUCT = 'product';
    const TABLE_CATEGORY='category';
    const TABLE_CART = "cart";
    const TABLE_CART_ITEM = "cart_item";
   /* public function getAll($select = ['*'],$orderBys=[],$limit=12){
       return $this->all(Self::TABLE_PRODUCT,$select,$orderBys,$limit);
    }*/
    public function getAll(){
        $sql = "SELECT * FROM ".self::TABLE_PRODUCT;
        return $this->getByQuery($sql);
    }
    public function getProForHome(){
        $sql = "SELECT * FROM ".self::TABLE_PRODUCT." LIMIT 12";
        return $this->getByQuery($sql);
    }
    //lấy id và xuất ra chi tiết sản phẩm
    public function findById($id){
      return $this->find(self::TABLE_PRODUCT,$id);
    }
    // lấy sản phẩm theo thể loại
    public function  getByCategoryId($categoryId)
    {
        $sql = "SELECT * FROM  " .Self::TABLE_PRODUCT. " WHERE category_id = ${categoryId}";

        return $this->getByQuery($sql);
    }



    public function  findProductRelated($id)
    {
        //lấy id thể loại của sản phẩm
        $categoryId = $this->findCategoryId(self::TABLE_PRODUCT,$id);
        //chuyển mảng thành chuỗi
        $categoryId = implode(' ',$categoryId);
        //lấy ra sản phẩm liên quan từ thể loại
        $sql = "SELECT * FROM  " .Self::TABLE_PRODUCT ." WHERE category_id = ${categoryId}  LIMIT 5";
        return $this->getByQuery($sql);
    }

    //lấy các sản phẩm thuộc chủ đề ngày sinh nhật
    public function getByParentCategory(){
            $sql="SELECT * FROM ".self::TABLE_PRODUCT." JOIN ".self::TABLE_CATEGORY." ON product.category_id = category.category_id WHERE category.parent_id=1 LIMIT 12";
            return $this->getByQuery($sql);
    }

    //hàm tìm kiếm sản phẩm qua product_name
    public function search($productName){
        $sql="SELECT * FROM ".self::TABLE_PRODUCT. " WHERE product_name like '%${productName}%'  ";
        return $this->getByQuery($sql);
    }

    public function store($data){
    $this->create(Self::TABLE_PRODUCT,$data);
    }
    public function updateData($id,$data){
        $this->update(Self::TABLE_PRODUCT,$id,$data);
    }
    public function destroy($id)
    {
        $this->delete(Self::TABLE_PRODUCT,$id);
    }

    //lấy sản phẩm trong giỏ hàng
    public function getByCartItem($cartId){
       // $sql = "SELECT * FROM ".self::TABLE_PRODUCT;
       // $sql = "SELECT * FROM ".self::TABLE_PRODUCT." , ".self::TABLE_CART_ITEM." WHERE product.product_id = cart_item.product_id AND cart_item.cart_id = ${cartId}";
        $sql =" SELECT product.product_id,product.product_name,product.price,product.thumbnail,cart_item.quantity FROM ".self::TABLE_PRODUCT." JOIN ".self::TABLE_CART_ITEM ." ON product.product_id = cart_item.product_id AND cart_item.cart_id= ${cartId}";
        return $this->getByQuery($sql);
    }

    /*admin*/
    public function saveProduct($name,$price=0,$quantity=0,$categoryId=1000,$description=null,$thumbnail=null){
            $sql = "INSERT INTO ".self::TABLE_PRODUCT." (product_name,price,quantity,category_id,product_description,thumbnail) 
            VALUES('${name}',${price},${quantity},${categoryId},'${description}','${thumbnail}')";
            $this->QueryOneArray($sql);
    }
}