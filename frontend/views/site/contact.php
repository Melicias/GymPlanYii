<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Contact';
?>
<div class="site-contact"  style="text-align: center">
    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <h1>
       Contactos dos Adminstradores/Treinadores:
    </h1>

    <div class="row">
        <?php
        foreach ($admins as $admin){ ?>
        <div class="body-content col-sm-4 col-md-3">
            <b><h3><?=$admin->primeiroNome?> <?=$admin->ultimoNome?></b></h4><?=$admin->email?>
        </div>
        <?php }  ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
