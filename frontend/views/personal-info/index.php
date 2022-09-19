<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\PersonalInfo;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonalInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Personal Infos';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    
    <?php foreach ($user as $model) : 
    // var_dump($model);
        $personal = PersonalInfo::find()->where(["user_id"=> (String)Yii::$app->user->identity->id])->one();
        if(empty($personal)) { ?>
             <div class="jumbotron text-center bg-transparent mt-0 pt-0">
                <h1 class="display-4">You don't have any personal information. !</h1>

                <p><?php echo Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']); ?></p>
            </div>
        <?php } else { ?>
            <?= Html::a('Update', ['update', '_id' => (string) $personal->_id], ['class' => 'btn btn-primary mb-3 float-right btn-sm']) ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // '_id',
                    // 'user_id',
                    'username',
                    'email',
                ],
        ]) ?>
        <?= DetailView::widget([
            'model' => $personal,
            'attributes' => [
                // '_id',
                // 'user_id',
                [
                    'label' => 'picture',
                    'attribute' => 'picture',
                    'format' => ['image', ['width' => '25%']],
                    'value' => function ($personal) {
                        return ($personal->picture);
                    }
                ],
                [
                    'label' => 'First Name',
                    'value' => $personal->fname
                ],
                [
                    'label' => 'Last Name',
                    'value' => $personal->lname
                ],
                'gender',
                [
                    'attribute' => 'House number',
                    'format' => 'raw',
                    'value' => function ($personal) {
                        return $personal->address[0];
                    },
                ],
                [
                    'attribute' => 'City',
                    'format' => 'raw',
                    'value' => function ($personal) {
                        return $personal->address[1];
                    },
                ],
                [
                    'attribute' => 'State',
                    'format' => 'raw',
                    'value' => function ($personal) {
                        return $personal->address[2];
                    },
                ],
                [
                    'attribute' => 'State',
                    'format' => 'raw',
                    'value' => function ($personal) {
                        return $personal->address[3];
                    },
                ],
                'phone',
            ],
        ]) ?>
        <?php }?>
    <?php endforeach; ?>
</div>
