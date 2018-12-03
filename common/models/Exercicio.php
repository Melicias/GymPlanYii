<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercicio".
 *
 * @property int $id_exercicio
 * @property string $foto
 * @property string $nome
 * @property string $descricao
 * @property int $repeticoes
 * @property int $tempo
 * @property int $id_zona
 *
 * @property ZonaExercicio $zona
 * @property TreinoExercicio[] $treinoExercicios
 */
class Exercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto', 'nome', 'descricao'], 'required'],
            ['id_zona', 'required', 'message' => 'Se ainda não existir Zonas, adicione algumas zonas'],
            ['repeticoes', 'required', 'when' => function($model) {
                return $model->tempo == '';
            },'whenClient' => "function (attribute, value) {
                return $('#exercicio-tempo').val() == '';
            }"],
            [['repeticoes', 'tempo', 'id_zona'], 'integer'],
            [['foto'], 'string', 'max' => 200],
            [['nome'], 'string', 'max' => 25],
            [['descricao'], 'string', 'max' => 250],
            [['id_zona'], 'exist', 'skipOnError' => true, 'targetClass' => ZonaExercicio::className(), 'targetAttribute' => ['id_zona' => 'id_zona']],
        ];
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
            'id_zona' => 'Zona do exercicio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZona()
    {
        return $this->hasOne(ZonaExercicio::className(), ['id_zona' => 'id_zona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreinoExercicios()
    {
        return $this->hasMany(TreinoExercicio::className(), ['id_exercicio' => 'id_exercicio']);
    }

    /**
     * @return String
     */
    public static function getZonaName($id)
    {
        $cat = ZonaExercicio::find()->where(['id_zona' => $id])->one();
        return $cat->nome;
    }

    /**
    * @return String
    */
    public function getZonaNameInExercicio()
    {
        $cat = ZonaExercicio::find()->where(['id_zona' => $this->id_zona])->one();
        return $cat->nome;
    }

    /*public function relations()
    {
        return array(
            'treinos' => array(self::MANY_MANY, 'treino', 'Treino_Exercicio(id_exercicio, id_treino)'),
        );
    }*/

    public function getTreinos() {
        return $this->hasMany(Treino::className(), ['id_treino' => 'id_treino'])
            ->viaTable('Treino_Exercicio', ['id_exercicio' => 'id_exercicio']);
    }

}
