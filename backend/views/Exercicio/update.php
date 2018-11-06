<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */

$this->title = 'Atualizar Exercicio: ' . $model->id_exercicio;
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_exercicio, 'url' => ['view', 'id' => $model->id_exercicio]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="exercicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
