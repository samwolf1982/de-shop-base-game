<?php

namespace frontend\controllers;

use app\models\Points;
use Yii;
use app\models\Topupbalance;
use app\models\TopupbalanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopupbalanceController implements the CRUD actions for Topupbalance model.
 */
class TopupbalanceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Topupbalance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopupbalanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topupbalance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Topupbalance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Topupbalance();
        $model->created_at=time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            yii::error(Yii::$app->request->post('Topupbalance')['u_id']);
            $points=Points::find()->where(['u_id'=>Yii::$app->request->post('Topupbalance')['u_id']])->one();
            $modif=100;
if ($points){
    $points->u_id=Yii::$app->request->post('Topupbalance')['u_id'];
    $points->shnappunkte=($points->shnappunkte + ($modif*Yii::$app->request->post('Topupbalance')['total']));
    if ($points->validate()){
        $points->save();
    }else{
        die('some validate error1');
    }
}else{
    $points=new Points();
    $points->u_id=Yii::$app->request->post('Topupbalance')['u_id'];
    $points->shnappunkte=($modif*Yii::$app->request->post('Topupbalance')['total']);
  if ($points->validate()){
      $points->save();
  }else{
      die('some validate error2');
  }

}

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Topupbalance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Topupbalance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Topupbalance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Topupbalance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topupbalance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
