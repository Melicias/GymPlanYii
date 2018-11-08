<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "treino".
 *
 * @property int $id_treino
 * @property string $nome
 * @property string $descricao
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
        return 'treino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'id_categoria', 'id_dificuldade', 'repeticoes'], 'required'],
            [['id_categoria', 'id_dificuldade', 'repeticoes'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 300],
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
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'id_categoria' => 'Categoria',
            'id_dificuldade' => 'Dificuldade',
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

    /*public function relations()
    {
        return array(
            'exercicios' => array(self::MANY_MANY, 'exercicio', 'Treino_Exercicio(id_treino, id_exercicio)'),
        );
    }*/

    public function getExercicios() {
        return $this->hasMany(Exercicio::className(), ['id_exercicio' => 'id_exercicio'])
            ->viaTable('Treino_Exercicio', ['id_treino' => 'id_treino']);
    }

    /**
     * @return String
     */
    public static function getCategoriaName($id)
    {
        $cat = Categoria::find()->where(['id_categoria' => $id])->one();
        return $cat->nome;
    }

    /**
     * @return String
     */
    public static function getDificuldadeDificuldade($id)
    {
        $dif = Dificuldade::find()->where(['id_dificuldade' => $id])->one();
        return $dif->dificuldade;
    }

}
