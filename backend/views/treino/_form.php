<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Categoria;
use common\models\Dificuldade;

/* @var $this yii\web\View */
/* @var $model common\models\Treino */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(
        ArrayHelper::map(Categoria::find()->asArray()->all(), 'id_categoria', 'nome')) ?>

    <?= $form->field($model, 'id_dificuldade')->dropDownList(
        ArrayHelper::map(Dificuldade::find()->asArray()->all(), 'id_dificuldade', 'dificuldade')) ?>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
