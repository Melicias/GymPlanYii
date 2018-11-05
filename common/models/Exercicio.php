<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%exercicio}}".
 *
 * @property int $id_exercicio
 * @property string $foto
 * @property string $nome
 * @property string $descrição
 * @property int $repeticoes
 * @property int $tempo
 *
 * @property TreinoExercicio[] $treinoExercicios
 */
class Exercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%exercicio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exercicio', 'foto', 'nome', 'descrição'], 'required'],
            [['id_exercicio', 'repeticoes', 'tempo'], 'integer'],
            [['foto'], 'string', 'max' => 200],
            [['nome'], 'string', 'max' => 25],
            [['descrição'], 'string', 'max' => 250],
            [['id_exercicio'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exercicio' => 'Id Exercicio',
            'foto' => 'Foto',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'repeticoes' => 'Repeticoes',
            'tempo' => 'Tempo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreinoExercicios()
    {
        return $this->hasMany(TreinoExercicio::className(), ['id_exercicio' => 'id_exercicio']);
    }

    public function relations()
    {
        return array(
            'treinos' => array(self::MANY_MANY, 'treino', 'Treino_Exercicio(id_exercicio, id_treino)'),
        );
    }
}
