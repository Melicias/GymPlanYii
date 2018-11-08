<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\ZonaExercicio;

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

    <div class="row">
        <div class="col-xs-10">
            <?= $form->field($model, 'id_zona')->dropDownList(
                ArrayHelper::map(ZonaExercicio::find()->asArray()->all(), 'id_zona', 'nome')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <?= Html::a('Criar Zonas exercicio', ['zona-exercicio/create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
