<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


            <?= $form->field($model, 'primeiroNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ultimoNome')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'dataNascimento')->textInput() ?>

            <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sexo')->DropDownList(
                [ '0' => 'Feminino', '1' => 'Masculino', ] )?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div style="color:#999;margin:1em 0">
                    Não tem uma conta ainda? <?= Html::a('Registe-se', ['site/signup']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
