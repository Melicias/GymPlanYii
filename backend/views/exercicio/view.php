<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Exercicio */

$this->title = $model->id_exercicio;
$this->params['breadcrumbs'][] = ['label' => 'Exercicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exercicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_exercicio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id_exercicio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende apagar o exercicio?',
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
            'descricao',
            'repeticoes',
            'tempo',
            'id_zona',
            [
                'label' => 'id_zona',
                'value' => $model->getZonaName($model->id_zona),
            ],
        ],
    ]) ?>
    <p>Preview da Foto: </p>
    <object class=".img-responsive" height="250px" width="350px" data="<?=$model->foto;?>" type="image/png" style="">
        <img src="https://dubsism.files.wordpress.com/2017/12/image-not-found.png" height="250px" width="300px" alt="Imagem não disponivel" style="">
    </object>


</div>
