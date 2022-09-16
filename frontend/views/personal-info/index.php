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
        $personal = PersonalInfo::find()->where(["user_id"=> (String)Yii::$app->user->identity->id])->one();
        if(empty($personal)) {
           echo Html::a('Create Personal Info', ['create'], ['class' => 'btn btn-success']); 
        } else { ?>
        <!-- // var_dump($personal); -->
        <?= Html::a('Update', ['update', '_id' => (string) $personal->_id], ['class' => 'btn btn-primary']) ?>
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
                'fname',
                'lname',
                'address',
                'picture',
                'phone',
                'gender',
            ],
        ]) ?>
        <!-- <div><?=$model->username ?></div>
        <div><?=$model->email ?></div>
        <div><?=$personal->fname ?></div>
        <div><?=$personal->lname ?></div>
        <div><?=$personal->address ?></div>
        <div><?=$personal->picture ?></div>
        <div><?=$personal->phone ?></div>
        <div><?=$personal->gender ?></div>-->
        <?php }?>
    <?php endforeach; ?>
</div>
