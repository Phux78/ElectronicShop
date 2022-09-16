<?php

use app\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carts';
// $this->params['breadcrumbs'][] = $this->title;
$total = 0;
$subtotal = 0;
?>
<!--  -->
<section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $model) : 
                    $subtotal += (int)$model->quantity * (int)$model->price; 
                    $product = Products::find()->where(["product_id"=> $model->product_id])->one();    
                    $total += (int)$model->quantity * (int)$product->productPrice; 
                    // var_dump($product);
                ?>
                <tr>
                    <td>
                        <div class="media">
                            <div class="d-flex " style="height: 220px;" >
                                <img src="<?=$product->productImage[0]?>" alt="" />
                            </div>
                            <div class="media-body">
                            <p><?=$product->productName?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5><?=$model->price?></h5>
                    </td>
                    <td>
                        <div class="product_count">
                            <!-- <span class="input-number-decrement"> <i class="ti-angle-down"></i></span> -->
                            <input class="input-number" type="text" value="<?=$model->quantity?>" min="0" max="10">
                            <!-- <span class="input-number-increment"> <i class="ti-angle-up"></i></span> -->
                        </div>
                    </td>
                    <td>    
                        <h5>$<?= $total ?></h5>
                    </td>
                </tr>
                <?php $total = 0 ;endforeach; ?>
                <tr class="bottom_button">
                    <td>
                        <a class="btn_1" href="#">Update Cart</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="cupon_text float-right">
                            <a class="btn_1" href="#">Close Coupon</a>
                        </div>
                    </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>$<?= $subtotal ?></h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section> 




<!--================Cart Area =================-->
<!-- --> 
  <!--================End Cart Area =================-->
