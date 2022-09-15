<?php

use app\models\Products;
use app\models\Brand;

/** @var yii\web\View $this */

$this->title = 'ElectronicShop';
$product = Products::find()->where(['status' => '1'])->all();
$brand = Brand::find()->where(['status' => '1'])->all();
?>

<!-- product_list part start-->
<!-- New Products -->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>New Products</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    $newProducts = array_slice($product, 0, 6);
                    foreach ($newProducts as $index => $item) { ?>
                        <div class="single_product_item">
                            <div style="height: 220px;">
                                <img src="<?= $item->productImage[1] ?>" alt="">
                            </div>
                            <div class="single_product_text mt-5">
                                <h4><?= $item->productName ?></h4>
                            </div>
                            <a href="index.php?r=products/view&_id=<?=$item->_id?>" class="btn btn-info btn-block">Add to Cart</a>
                            <a href="">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->


<!-- product_list part start-->
<section class="product_list best_seller section_padding">
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
                            <a href="#">
                                <div style="height: 100px;">
                                    <img src="<?= $item->brandImage ?>" alt="">
                                </div>
                                <div class="single_product_text">
                                    <h4><?= $item->brandName ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->