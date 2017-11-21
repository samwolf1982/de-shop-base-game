<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topupbalance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topupbalance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username')) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
