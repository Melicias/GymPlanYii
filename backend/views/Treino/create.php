<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Treino */

$this->title = 'Criar Treino';
$this->params['breadcrumbs'][] = ['label' => 'Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treino-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
