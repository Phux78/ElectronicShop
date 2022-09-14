<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'productName') ?>

    <?= $form->field($model, 'productPrice') ?>

    <?= $form->field($model, 'productImage') ?>

    <?= $form->field($model, 'productDescrip') ?>

    <?= $form->field($model, 'inStock') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'brand_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
