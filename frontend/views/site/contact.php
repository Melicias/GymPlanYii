<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <h1>
       Contactos de todos os Personal Trainers:
    </h1>

    <div class="row">
        <div class="col-lg-5">
        <br>
             <?php  foreach ($admins as $admin){
                  echo $admin->primeiroNome. ' '. $admin->ultimoNome. ' - '. $admin->email ;?>
                 <br><br>
             <?php }  ?>

        </div>
    </div>

</div>
