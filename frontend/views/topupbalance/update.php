<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Topupbalance */

$this->title = 'Update Topupbalance: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Topupbalances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topupbalance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
