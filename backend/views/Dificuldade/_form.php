<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dificuldade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dificuldade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dificuldade')->textInput() ?>

    <?= $form->field($model, 'dificuldade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
