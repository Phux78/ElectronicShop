<?php

use yii\helpers\Html;
use app\models\Products;
use app\models\Brand;
use app\models\Type;
// variables
$brand = Brand::find()->where(['status' => '1'])->all();
$type = Type::find()->where(['status' => '1'])->all();
$product = Products::find()->where(['status' => '1'])->all();
$brandName;
$typeName;
?>

<div style="margin: 70px 0">
    <div class="container">
        <h1>All Products</h1>
        <div class="row">
            <?php foreach ($product as $index => $model) { ?>
                <div class="col-md-3">
                    <!-- card item -->
                    <div class="single_product_model">
                        <div style="height: 220px;">
                            <img src="<?= $model->productImage[1] ?>" alt="">
                        </div>
                        <div class="single_product_text mt-5" style="height: 220px;">
                            <h4><?= $model->productName ?></h4>
                            <?php
                            foreach ($brand as $index => $brand_model) {
                                if ($brand_model->brand_id == $model->brand_id) {
                                    $brandName = $brand_model->brandName;
                                }
                            }
                            ?>
                            <p><?= $brandName ?></p>
                            <div class="d-flex justify-content-between">
                                <b style="color: #F1574F;">
                                    $ <?= number_format($model->productPrice) ?>
                                </b>
                                <!-- price before discount -->
                                <b style="color: #BDBDBD; text-decoration: line-through;">
                                    $ <?= number_format($model->productPrice + 2000) ?>
                                </b>
                            </div>
                            <p><?= strlen($model->productDescrip) > 50 ? mb_substr($model->productDescrip, 0, 50, 'UTF-8') . "..." : " " ?></p>
                        </div>
                        <a href="index.php?r=products/view&_id=<?= $model->product_id ?>" class="btn btn-warning btn-sm btn-block mt-2">More Detail</a>
                    </div>
                    <!-- end of card item -->
                </div>
            <?php } ?>
        </div>
    </div>
</div>