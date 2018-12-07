<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact"  style="text-align: center">

    <h1>
       Contactos de todos os Personal Trainers:
    </h1>

    <div class="row">
        <div class="asd"  style="text-align: center">
            <div class="" style="text-align: center">

        <br>
             <?php  foreach ($admins as $admin){
                  echo " <b><h3>".$admin->primeiroNome. ' '. $admin->ultimoNome. "</b></h4>".'  '. $admin->email ;?>
                 <br><br><br>
             <?php }  ?>
            </div>
        </div>
    </div>

</div>
