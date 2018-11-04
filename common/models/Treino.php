<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%treino}}".
 *
 * @property int $id_treino
 * @property int $id_categoria
 * @property int $id_dificuldade
 * @property int $repeticoes
 *
 * @property Categoria $categoria
 * @property Dificuldade $dificuldade
 * @property TreinoExercicio $treinoExercicio
 */
class Treino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%treino}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_treino', 'id_categoria', 'id_dificuldade', 'repeticoes'], 'required'],
            [['id_treino', 'id_categoria', 'id_dificuldade', 'repeticoes'], 'integer'],
            [['id_treino'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            [['id_dificuldade'], 'exist', 'skipOnError' => true, 'targetClass' => Dificuldade::className(), 'targetAttribute' => ['id_dificuldade' => 'id_dificuldade']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_treino' => 'Id Treino',
            'id_categoria' => 'Id Categoria',
            'id_dificuldade' => 'Id Dificuldade',
            'repeticoes' => 'Repeticoes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDificuldade()
    {
        return $this->hasOne(Dificuldade::className(), ['id_dificuldade' => 'id_dificuldade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreinoExercicio()
    {
        return $this->hasOne(TreinoExercicio::className(), ['id_treino' => 'id_treino']);
    }
}
