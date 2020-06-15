<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mesaentrada;

/**
 * MesaentradaSearch represents the model behind the search form of `app\models\Mesaentrada`.
 */
class MesaentradaSearch extends Mesaentrada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categoria', 'id_tramite', 'id_empresa'], 'integer'],
            [['fec', 'fec_ingreso', 'descripcion'], 'safe'],
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
        $query = Mesaentrada::find();

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
            'id' => $this->id,
            'fec' => $this->fec,
            'fec_ingreso' => $this->fec_ingreso,
            'id_categoria' => $this->id_categoria,
            'id_tramite' => $this->id_tramite,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
