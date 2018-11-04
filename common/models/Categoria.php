<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%categoria}}".
 *
 * @property int $id_categoria
 * @property string $nomeCategoria
 *
 * @property Treino[] $treinos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categoria}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria', 'nomeCategoria'], 'required'],
            [['id_categoria'], 'integer'],
            [['nomeCategoria'], 'string', 'max' => 40],
            [['id_categoria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nomeCategoria' => 'Nome Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreinos()
    {
        return $this->hasMany(Treino::className(), ['id_categoria' => 'id_categoria']);
    }
}
