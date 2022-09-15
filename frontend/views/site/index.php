<?php

use app\models\Products;
use app\models\Brand;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
$product = Products::find()->where(['status' => '1'])->all();
$brand = Brand::find()->where(['status' => '1'])->all();
?>

<!-- product_list part start-->
<section class="product_list best_seller section_padding" style="background-color: #ECFDFF;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Shop by brands</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php foreach ($brand as $index => $item) { ?>
                        <div class="single_product_item">
                            <div style="height: 100px;">
                                <img src="<?= $item->brandImage ?>" alt="">
                            </div>
                            <div class="single_product_text">
                                <h4><?= $item->brandName ?></h4>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->