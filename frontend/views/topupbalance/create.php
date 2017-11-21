<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Topupbalance */

$this->title = 'Create Topupbalance';
$this->params['breadcrumbs'][] = ['label' => 'Topupbalances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topupbalance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
