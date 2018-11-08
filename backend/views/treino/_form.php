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

    <div class="row">
        <div class="col-xs-10">
            <?= $form->field($model, 'id_categoria')->dropDownList(
                ArrayHelper::map(Categoria::find()->asArray()->all(), 'id_categoria', 'nome')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <?= Html::a('Criar categorias', ['categoria/create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10">
            <?= $form->field($model, 'id_dificuldade')->dropDownList(
                ArrayHelper::map(Dificuldade::find()->asArray()->all(), 'id_dificuldade', 'dificuldade')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <?= Html::a('Criar Dificuldades', ['dificuldade/create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
