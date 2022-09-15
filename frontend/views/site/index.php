<?php

use app\models\Products;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
$product = Products::find()->where(['status' => '1'])->all();
?>
<div class="container">
    <div class="row">
        <?php foreach ($product as $index => $model) { ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= $model->productImage[0] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $model->productName ?></h5>
                        <p class="card-text"><?= $model->productDescrip ?></p>
                        <a href="#" class="btn btn-info btn-block">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>