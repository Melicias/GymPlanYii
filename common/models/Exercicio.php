<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%exercicio}}".
 *
 * @property int $id_exercicio
 * @property string $foto
 * @property string $nome
 * @property string $descricao
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
            [['foto', 'nome', 'descricao'], 'required'],
            //[['repeticoes', 'tempo'], 'my_required'],
            [['repeticoes', 'tempo'], 'integer'],
            [['foto'], 'string', 'max' => 200],
            [['nome'], 'string', 'max' => 25],
            [['descricao'], 'string', 'max' => 250],
        ];
    }

    public function my_required($attribute_name, $params)
    {
        if (empty($this->repeticoes)
            && empty($this->tempo)
        ) {
            $this->addError($attribute_name, Yii::t('Exercicio', 'As repeticoes ou o tempo deve ter algo!'));
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exercicio' => 'ID Exercicio',
            'foto' => 'Foto (url)',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'repeticoes' => 'Repeticoes',
            'tempo' => 'Tempo (em segundos)',
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
