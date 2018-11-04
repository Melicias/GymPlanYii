<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dificuldade */

$this->title = 'Update Dificuldade: ' . $model->id_dificuldade;
$this->params['breadcrumbs'][] = ['label' => 'Dificuldades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dificuldade, 'url' => ['view', 'id' => $model->id_dificuldade]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dificuldade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
