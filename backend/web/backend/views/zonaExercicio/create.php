<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ZonaExercicio */

$this->title = 'Create Zona Exercicio';
$this->params['breadcrumbs'][] = ['label' => 'Zona Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zona-exercicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
