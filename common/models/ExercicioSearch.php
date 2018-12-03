<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Exercicio;

/**
 * ExercicioSearch represents the model behind the search form of `common\models\Exercicio`.
 */
class ExercicioSearch extends Exercicio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exercicio', 'repeticoes', 'tempo', 'id_zona'], 'integer'],
            [['foto', 'nome', 'descricao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Exercicio::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_exercicio' => $this->id_exercicio,
            'repeticoes' => $this->repeticoes,
            'tempo' => $this->tempo,
            'id_zona' => $this->id_zona,
        ]);

        $query->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchWithinTreino($params,$treino)
    {
        //['!=', 'cancel_date', $date] //->where(['!=', 'id_exercicio', ['1','2','3']]); //->where(['not', ['like','id_exercicio', 1]]);
        $arr = array();
        for($i=0;$i<count($treino->exercicios);$i++){
            $arr[] = $treino->exercicios[$i]->id_exercicio;
        }
        $query = Exercicio::find()->where(['not in','id_exercicio' ,$arr]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_exercicio' => $this->id_exercicio,
            'repeticoes' => $this->repeticoes,
            'tempo' => $this->tempo,
            'id_zona' => $this->id_zona,
        ]);

        $query->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
