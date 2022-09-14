<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "products".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $product_id
 * @property mixed $productName
 * @property mixed $productPrice
 * @property mixed $productImage
 * @property mixed $productDescrip
 * @property mixed $inStock
 * @property mixed $status
 * @property mixed $type_id
 * @property mixed $brand_id
 */
class Products extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'product_id',
            'productName',
            'productPrice',
            'productImage',
            'productDescrip',
            'inStock',
            'status',
            'type_id',
            'brand_id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'productName', 'productPrice', 'productImage', 'productDescrip', 'inStock', 'status', 'type_id', 'brand_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'product_id' => 'Product ID',
            'productName' => 'Product Name',
            'productPrice' => 'Product Price',
            'productImage' => 'Product Image',
            // 'productImage' => 'Product Image_2',
            // 'productImage' => 'Product Image_3',
            'productDescrip' => 'Product Descrip',
            'inStock' => 'In Stock',
            'status' => 'Status',
            'type_id' => 'Type ID',
            'brand_id' => 'Brand ID',
        ];
    }

    public function getTableSchema(){
        return false;
    }
}
