<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "cart".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $cart_id
 * @property mixed $product_id
 * @property mixed $price
 * @property mixed $quantity
 * @property mixed $user_id
 */
class Cart extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'cart_id',
            'product_id',
            'price',
            'quantity',
            'user_id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'product_id', 'price', 'quantity', 'user_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'cart_id' => 'Cart ID',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'user_id' => 'User ID',
        ];
    }

    public function getTableSchema(){
        return false;
    }
}
