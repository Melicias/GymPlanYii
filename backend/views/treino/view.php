<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Treino */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treino-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_treino], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_treino], [
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
            'id_treino',
            'nome',
            'descricao',
            [
                'label' => 'Categoria',
                'value' => $model->getCategoriaName($model->id_categoria),
            ],
            [
                'label' => 'Dificuldade',
                'value' => $model->getDificuldadeDificuldade($model->id_categoria),
            ],
            'repeticoes',
        ],
    ]) ?>

</div>
