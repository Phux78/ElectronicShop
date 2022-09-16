<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Brand;
use app\models\Type;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

// change page title to product name
// $this->title = $model->_id;
$this->title = $model->productName . " - Electronic Shop";

// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// variables
$brand = Brand::find()->where(['status' => '1'])->all();
$type = Type::find()->where(['status' => '1'])->all();
$product = Products::find()->where(['status' => '1'])->all();
$brandName;
$typeName;
?>
<?php
$form = ActiveForm::begin(); ?>
<header>
    <link rel="stylesheet" href="../../theme/css/custom.css">
</header>
<!--================Single Product Area =================-->
<div class="product_image_area section-padding-custom">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-6 col-xl-6">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div class="mb-3" data-thumb="<?= $model->productImage[0] ?>">
                            <img src="<?= $model->productImage[0] ?>" />
                        </div>
                        <div class="mb-3" data-thumb="<?= $model->productImage[1] ?>">
                            <img src="<?= $model->productImage[1] ?>" />
                        </div>
                        <div class="mb-3" data-thumb="<?= $model->productImage[2] ?>">
                            <img src="<?= $model->productImage[2] ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="s_product_text">
                    <h3><?= $model->productName ?></h3>
                    <label style="text-decoration: line-through; color: #02B29A;">
                        ราคาปกติ $ <?= number_format($model->productPrice + 2000) ?>
                    </label>
                    <h2>
                        <div class="d-flex">
                            <span class="badge bg-secondary mr-4 text-light bg-danger">
                                - 20%
                            </span>
                            $ <?= number_format($model->productPrice) ?>
                        </div>
                    </h2>
                    <ul class="list">
                        <!-- <li>
                            <a class="active" href="#">
                            <span>Category</span> : <?= $model->type_id ?></a>
                        </li> -->
                        <!-- brand -->
                        <li>
                            <?php
                            foreach ($brand as $index => $brand_item) {
                                if ($brand_item->brand_id == $model->brand_id) {
                                    $brandName = $brand_item->brandName;
                                }
                            }
                            ?>
                            <a href="#">
                                <span>Brand</span> : <?= $brandName ?>
                            </a>
                        </li>
                        <!-- type -->
                        <li>
                            <?php
                            foreach ($type as $index => $type_item) {
                                if ($type_item->type_id == $model->type_id) {
                                    $typeName = $type_item->typeName;
                                }
                            }
                            ?>
                            <a href="#">
                                <span>Type</span> : <?= $typeName ?>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>In Stock</span> : <?= $model->inStock ?>
                            </a>
                        </li>
                    </ul>
                    <p>
                        <?= $model->productDescrip ?>
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center mr-5 pr-5">
                        <div class="product_count">
                            <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="input-number" type="text" value="1" min="0" max="10">
                            <span class="number-increment"> <i class="ti-plus"></i></span>
                        </div>
                        <!-- <a href="#" class="btn_3">add to cart</a> -->
                        <!-- <a href="#" class="like_us"> <i class="ti-heart"></i> </a> -->
                        <?php 
                            if (Yii::$app->user->isGuest) { ?>
                                <a href="index.php?r=site%2Flogin" class="btn_3 ml-5">Add to Cart</a>
                        <?php } else {
                                echo $form->field($cartModel, 'product_id')->hiddenInput(['value'=>$product_id])->label(false);
                                echo $form->field($cartModel, 'price')->hiddenInput(['value'=>$model->productPrice])->label(false);
                                echo $form->field($cartModel, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->id])->label(false);
                                echo $form->field($cartModel, 'quantity')->hiddenInput(['value'=>1])->label(false);
                                echo Html::submitButton('Add to cart', ['class' => 'btn_3 ']) ;
                            }
                        ?>
                        <a href="#" class="like_us ml-5"> <i class="ti-heart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!-- New Products -->
<section class="product_list best_seller section_padding" style="background-color: #F8F9FA;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>สินค้าอื่นๆ ที่คุณอาจสนใจ</h2>
                </div>
            </div>
        </div>
        <div class=" row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    $newProducts = array_slice($product, 0, 6);
                    foreach ($newProducts as $index => $item) { ?>
                        <div class="single_product_item">
                            <div style="height: 250px; overflow: hidden">
                                <img src="<?= $item->productImage[1] ?>" style="width: 100%; height: 100%; object-fit: cover;" class="product-view-recommend" alt="">
                            </div>
                            <div class=" single_product_text mt-5">
                                <h4><?= $item->productName ?></h4>
                                <?php
                                foreach ($brand as $index => $brand_item) {
                                    if ($brand_item->brand_id == $item->brand_id) {
                                        $brandName = $brand_item->brandName;
                                    }
                                }
                                ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <b style="color: #BDBDBD;">
                                        <?= $brandName ?>
                                    </b>
                                    <b style="color: #F1574F;">
                                        $ <?= number_format($item->productPrice) ?>
                                    </b>
                                    <!-- price before discount -->
                                    <b style="color: #BDBDBD; text-decoration: line-through;">
                                        $ <?= number_format($item->productPrice + 2000) ?>
                                    </b>
                                </div>
                            </div>
                            <a href="index.php?r=products/view&_id=<?= $item->_id ?>" class="btn btn-warning btn-sm btn-block mt-2">More Detail</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->

<?php ActiveForm::end(); ?>