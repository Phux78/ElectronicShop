<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

// $this->title = 'Signup';
// $this->params['breadcrumbs'][] = $this->title;
?>
<section style="margin: 0px 0;">
<div class="container" >
    <div class="site-signup ">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="offset-lg-3 col-lg-6">
        <p>Please fill out the following fields to signup:</p>
        </div>
        <div class="row">
            <div class="mt-5 offset-lg-3 col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
</section>