<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Dificuldade */

$this->title = 'Create Dificuldade';
$this->params['breadcrumbs'][] = ['label' => 'Dificuldades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dificuldade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
