<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%dificuldade}}".
 *
 * @property int $id_dificuldade
 * @property int $dificuldade
 *
 * @property Treino[] $treinos
 */
class Dificuldade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dificuldade}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dificuldade'], 'required'],
            [['dificuldade'], 'number', 'min' => 0, 'max' => 10],
            [['dificuldade'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dificuldade' => 'Id dificuldade',
            'dificuldade' => 'Dificuldade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreinos()
    {
        return $this->hasMany(Treino::className(), ['id_dificuldade' => 'id_dificuldade']);
    }

}
