<?php

class PaymentModel extends BaseModel
{
    const TABLE_PAYMENT_METHOD = 'payment_method';
    public function getAll(){
        $sql = "SELECT * FROM ".self::TABLE_PAYMENT_METHOD;
        return $this->getByQuery($sql);
    }
}