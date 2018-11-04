<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExercicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exercicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_exercicio') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'nome_Exercicio') ?>

    <?= $form->field($model, 'descrição') ?>

    <?= $form->field($model, 'repeticoes') ?>

    <?php // echo $form->field($model, 'tempo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
