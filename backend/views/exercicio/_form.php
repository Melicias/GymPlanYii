<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <h5>Tem de inserir as <strong>repetições</strong> ou o  <strong>tempo</strong>, em caso de inserir os dois as <strong>repetições prevacelaram</strong>.</h5>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <?= $form->field($model, 'tempo')->textInput() ?>

    <?= $form->field($model, 'id_zona')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
