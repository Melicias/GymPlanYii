<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?=$model->primeiroNome . " " . $model->ultimoNome?></h1>

    <p>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'primeiroNome',
            'ultimoNome',
            [
                'label' => 'dataNascimento',
                'value' => date_format(date_create($model->dataNascimento), 'd/m/Y'),
            ],
            'altura',
            'peso',
            [
                'label' => 'sexo',
                'value' => $model->getSexoName($model->sexo),
            ],
            'email:email',
            'password_hash',
            'password_reset_token',
            [
                'attribute'=>'status',
                'filter'=>[0 => 'Bloqueado',10 => 'Desbloqueado'],
                'value' =>function($model){  return $model->status == 10 ? 'Desbloqueado' : 'Bloqueado';},
            ],
            [
                'label' => 'created_at',
                'value' => date('m/d/Y', $model->created_at),
            ],
            [
                'label' => 'created_at',
                'value' => date('m/d/Y', $model->updated_at),
            ],
            'auth_key',
        ],
    ]) ?>

    <?php if($model->status == \common\models\User::STATUS_ACTIVE){
        echo Html::a('Bloquear',['bloquear-user','id'=> $model->id,'value'=>\common\models\User::STATUS_DELETED], ['class'=>'btn btn-danger']);
    }else{
        echo Html::a('Desbloquear',['bloquear-user','id'=> $model->id,'value'=>\common\models\User::STATUS_ACTIVE], ['class'=>'btn btn-success']);
    }  ?>

</div>
