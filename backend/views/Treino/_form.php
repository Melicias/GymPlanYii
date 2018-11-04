<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Treino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_treino')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <?= $form->field($model, 'id_dificuldade')->textInput() ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
