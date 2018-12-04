<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zona_exercicio".
 *
 * @property int $id_zona
 * @property string $nome
 *
 * @property Exercicio[] $exercicios
 */
class ZonaExercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zona_exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'min' => 2 ,'max' => 30],
            [['nome'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_zona' => 'Id Zona',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExercicios()
    {
        return $this->hasMany(Exercicio::className(), ['id_zona' => 'id_zona']);
    }

}
