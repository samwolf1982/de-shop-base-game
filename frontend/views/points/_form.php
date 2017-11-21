<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Points */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="points-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'shnappunkte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rabatppunkte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
