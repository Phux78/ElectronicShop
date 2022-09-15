<?php

use app\models\Products;
use app\models\Brand;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
$product = Products::find()->where(['status' => '1'])->all();
$brand = Brand::find()->where(['status' => '1'])->all();
?>