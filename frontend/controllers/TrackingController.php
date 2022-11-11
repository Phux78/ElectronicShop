<?php

namespace frontend\controllers;

use app\models\Cart;
use app\models\CartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class TrackingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cart models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (Yii::$app->user->isGuest)
            $this->redirect(['site/login']);
        else {
            $tracking = Cart::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->all();
            // $searchModel = new CartSearch();
            // $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'Tracking' => $tracking,
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Cart model.
     * @param int $_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($_id),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tracking();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', '_id' => (string) $model->_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($_id)
    {
        $model = $this->findModel($_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', '_id' => (string) $model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($_id)
    {
        $this->findModel($_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $_id ID
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = Cart::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
