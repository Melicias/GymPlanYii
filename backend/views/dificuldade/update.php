<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dificuldade */

$this->title = 'Atualizar Dificuldade: ' . $model->id_dificuldade;
$this->params['breadcrumbs'][] = ['label' => 'Dificuldades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dificuldade, 'url' => ['view', 'id' => $model->id_dificuldade]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="dificuldade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
