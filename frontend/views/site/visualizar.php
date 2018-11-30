<?php

use common\models\Exercicio;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="site-index">
    <div class="jumbotron">

    </div>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field() ?>

    <div class="row">
            <div class="col-md-3 col-sm-4">
            </div>

            <div class="col-sm-6 col-md-1">
                <br>
                <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

?>