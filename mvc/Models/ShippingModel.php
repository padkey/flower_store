<?php
class ShippingModel extends BaseModel
{
    const TABLE_SHIPPING_METHOD= 'shipping_method';

    public function getAll(){
        $sql = "SELECT * FROM ".self::TABLE_SHIPPING_METHOD;
        return $this->getByQuery($sql);
    }
}
?>