<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "brand".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $brand_id
 * @property mixed $brandName
 * @property mixed $brandImage
 * @property mixed $status
 */
class Brand extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'brand_id',
            'brandName',
            'brandImage',
            'status',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'brandName', 'brandImage', 'status'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'brand_id' => 'Brand ID',
            'brandName' => 'Brand Name',
            'brandImage' => 'Brand Image',
            'status' => 'Status',
        ];
    }

    public function getTableSchema(){
        return false;
    }
}
