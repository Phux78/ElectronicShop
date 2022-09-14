<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', '_id' => (string) $model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', '_id' => (string) $model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'product_id',
            'productName',
            'productPrice',
            'productImage',
            [
                'label' => 'Image Preview',
                'attribute' => 'productImage',
                'format' => ['image', ['width' => '25%']],
                'value' => function ($model) {
                    return ($model->productImage);
                }
            ],
            'productDescrip',
            'inStock',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $text = "";
                    if ($model->status == "1") {
                        $text = "Active";
                    } else {
                        $text = "Inactive";
                    }
                    return $model->status." (".$text.")";
                }
            ],
            'type_id',
            'brand_id',
        ],
    ]) ?>

</div>
