<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */

$this->title = 'Criar Exercicio';
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelZona' => $modelZona,
    ]) ?>

</div>
