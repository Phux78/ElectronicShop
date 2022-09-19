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

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>(String)Yii::$app->user->identity->id])->label(false); ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'lname') ?>

    <?= $form->field($model, 'gender')->dropDownList(
        ["male" => "Male", "female" => "Female"],
        ['prompt' => 'Select Gender']
    ) ?>

    <?= $form->field($model, 'address[0]')->label("House number") ?>

    <?= $form->field($model, 'address[1]')->label("City") ?>

    <?= $form->field($model, 'address[2]')->label("State") ?>

    <?= $form->field($model, 'address[3]')->label("Postal Code") ?>

    <?= $form->field($model, 'picture') ?>

    <?= $form->field($model, 'phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
