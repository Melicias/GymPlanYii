<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os seguintes campos para se registar</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'primeiroNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ultimoNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'dataNascimento')->textInput() ?>

            <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sexo')->DropDownList(
                [ 0 => 'Masculino', 1 => 'Feminino'] )?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
