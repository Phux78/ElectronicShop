<?php

use app\models\Products;
use frontend\controllers\ProductsController;
use frontend\controllers\CartController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tracking';
// $this->params['breadcrumbs'][] = $this->title;
?>
<section style="margin: 0px 0;">
<!-- link bar -->
<div class="container" >
  <div class="alert alert-dark w-100" role="alert" style="background-color: #F8F9FA;">
    <div class="d-flex justify-content-between">
      <?= Html::a('< กลับไปหน้าหลัก', ['/site/index'], ['class' => 'text-dark']) ?>
    </div>
  </div>
</div>

<!-- Tracking area -->
<section class="" style="padding-bottom: 100px;">
  <div class="container">
    <h1>Tracking</h1>
      <div class="table">
        <tr>ชื่อสินค้า</tr>
        <tr>ราคา</tr>
        <tr>จำนวน</tr>
      </div>
  </div>
</section>
