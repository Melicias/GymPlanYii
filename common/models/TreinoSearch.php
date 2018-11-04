<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Treino;

/**
 * TreinoSearch represents the model behind the search form of `backend\models\Treino`.
 */
class TreinoSearch extends Treino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_treino', 'id_categoria', 'id_dificuldade', 'repeticoes'], 'integer'],
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
        $query = Treino::find();

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
            'id_treino' => $this->id_treino,
            'id_categoria' => $this->id_categoria,
            'id_dificuldade' => $this->id_dificuldade,
            'repeticoes' => $this->repeticoes,
        ]);

        return $dataProvider;
    }
}
