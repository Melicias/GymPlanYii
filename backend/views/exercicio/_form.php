<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
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
                ArrayHelper::map(ZonaExercicio::find()->asArray()->orderBy('nome')->all(), 'id_zona', 'nome')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalZonaexercicio">Criar Zonas exercicio</button>
        </div>
    </div>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    <!-- Modal Categoria -->
    <div class="modal fade" id="myModalZonaexercicio" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1>Criar Categoria</h1>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'my-form-zonaexercicio',
                        'action' => Url::toRoute('exercicio/savezonaexercicio'),
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::toRoute('exercicio/validatezonaexercicio')
                    ]); ?>

                    <?= $form->field($modelZona, 'nome', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>

</div>
