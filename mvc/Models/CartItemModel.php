<?php

class CartItemModel extends BaseModel
{
    const TABLE_CART_ITEM = 'cart_item';

    public function getCartItemsByCartId($cartId)
    {
        $sql = "SELECT * FROM " . self::TABLE_CART_ITEM . " WHERE cart_id = ${cartId}";
        return $this->getByQuery($sql);
    }

    public function updateQuantity($productId, $quantity, $cartId)
    {
        $sql = "UPDATE " . self::TABLE_CART_ITEM . " SET quantity = ${quantity} WHERE product_id = ${productId} and cart_id = ${cartId} ;";
        return $this->getByQuery($sql);
    }

    public function insert($productId, $quantity, $cartId, $price)
    {
        $sql = "INSERT INTO " . self::TABLE_CART_ITEM . " (product_id,quantity,cart_id,price) VALUES (${productId},${quantity},${cartId},${price})";
        return $this->getByQuery($sql);
    }

    public function destroy($cartId)
    {
        $sql = "DELETE FROM " . self::TABLE_CART_ITEM . " WHERE cart_item.cart_id = ${cartId}";
        return $this->getByQuery($sql);
    }
}