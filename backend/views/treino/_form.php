<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
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
                ArrayHelper::map(Categoria::find()->asArray()->orderBy('nome')->all(), 'id_categoria', 'nome')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCategoria">Criar Categorias</button>
        </div>
    </div>

    <div class="row" id="randomasd">
        <div class="col-xs-10">
            <?= $form->field($model, 'id_dificuldade')->dropDownList(
                ArrayHelper::map(Dificuldade::find()->asArray()->orderBy('dificuldade')->all(), 'id_dificuldade', 'dificuldade')) ?>
        </div>
        <div class="col-xs-2">
            <br>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalDificuldade">Criar Dificuldades</button>
        </div>
    </div>

    <?= $form->field($model, 'repeticoes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <!-- Modal Dificuldade -->
    <div class="modal fade" id="myModalDificuldade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1>Criar Dificuldade</h1>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'my-form-dificuldade',
                        'action' => Url::toRoute('treino/savedificuldade'),
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::toRoute('treino/validatedificuldade')
                    ]); ?>

                    <?= $form->field($modelDif, 'dificuldade', ['enableAjaxValidation' => true])->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Categoria -->
    <div class="modal fade" id="myModalCategoria" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1>Criar Categoria</h1>
                </div>
                <div class="modal-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'my-form-categoria',
                        'action' => Url::toRoute('treino/savecategoria'),
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::toRoute('treino/validatecategoria')
                    ]); ?>

                    <?= $form->field($modelCat, 'nome', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>


</div>
