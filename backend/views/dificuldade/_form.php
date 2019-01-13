<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dificuldade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dificuldade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dificuldade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
