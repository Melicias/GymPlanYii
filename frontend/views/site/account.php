<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Alterar Dados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-account">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-account']); ?>

            <?= $form->field($model, 'primeiroNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ultimoNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'dataNascimento')->textInput(['disabled' => true,'value' => $model->dateFormat]) ?>


            <div class="form-group">
                <?= Html::submitButton('Alterar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
