<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\PersonalInfo */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="personal-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-12 mt-3 mb-3 text-center">
            <?php
                if(!empty($model->picture)) { ?>
                    <?= Html::img($model->picture, ['class' => 'rounded-circle']); ?>
                <?php } ?>
        </div>
    </div>

    <!-- grid -->
    <?= $form->field($model, 'user_id')->hiddenInput(['value' => (string)Yii::$app->user->identity->id])->label(false); ?>
    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'fname')->label('First Name') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'lname')->label('Last Name') ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'gender')->dropDownList(
                ["male" => "Male", "female" =>"Female"],
                ['prompt' => 'Select Gender']
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'address[0]')->label("House number") ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'address[1]')->label("City") ?>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'address[2]')->label("State") ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'address[2]')->label("State") ?>
        </div>
        <div class="col-4">
            <?= $form->field($model, 'address[3]')->label("Postal Code") ?>
        </div>
    </div>

    <?= $form->field($model, 'picture')->label('Profile Picture') ?>

    <?= $form->field($model, 'phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<!-- unused code
    <?= $form->field($model, 'gender')->dropDownList(
        ["male" => "Male", "female" => "Female"],
        ['prompt' => 'Select Gender']
    ) ?>

    <?= $form->field($model, 'gender')->radioList([
        'male' => 'Male',
        'female' => 'Female',
        'other'
    ]); ?>
-->