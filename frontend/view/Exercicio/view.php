<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Exercicio */

$this->title = $model->id_exercicio;
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_exercicio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_exercicio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_exercicio',
            'foto',
            'nome',
            'descrição',
            'repeticoes',
            'tempo',
        ],
    ]) ?>

</div>
