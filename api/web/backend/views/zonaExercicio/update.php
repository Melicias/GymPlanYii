<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ZonaExercicio */

$this->title = 'Update Zona Exercicio: ' . $model->id_zona;
$this->params['breadcrumbs'][] = ['label' => 'Zona Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_zona, 'url' => ['view', 'id' => $model->id_zona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zona-exercicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
