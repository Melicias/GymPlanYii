<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Treino */

$this->title = 'Atualizar Treino: ' . $model->id_treino;
$this->params['breadcrumbs'][] = ['label' => 'Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_treino, 'url' => ['view', 'id' => $model->id_treino]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="treino-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDif' => $modelDif,
        'modelCat' => $modelCat,
    ]) ?>

</div>
