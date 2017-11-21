<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PointsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Points';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="points-index">

    <h1><?= Html::encode($this->title) ?> Schnappunkte & Rabatpunkte</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Points', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'u_id',
            [
                'attribute' => 'u_id',
                'filter' => false,
                'format' => 'raw',
                'value' => function ($model) {
                    return  \common\models\User::find()->where(['id'=>$model->u_id])->one()['username'] ;
                },
            ],

            'shnappunkte',
            'rabatppunkte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
