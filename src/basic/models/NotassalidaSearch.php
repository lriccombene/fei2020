<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notassalida;

/**
 * NotassalidaSearch represents the model behind the search form of `app\models\Notassalida`.
 */
class NotassalidaSearch extends Notassalida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categoria', 'id_empresa', 'notificado'], 'integer'],
            [['fec_emision', 'detalle', 'fec_notificado'], 'safe'],
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
        $query = Notassalida::find();

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
            'fec_emision' => $this->fec_emision,
            'id_categoria' => $this->id_categoria,
            'id_empresa' => $this->id_empresa,
            'notificado' => $this->notificado,
            'fec_notificado' => $this->fec_notificado,
        ]);

        $query->andFilterWhere(['like', 'detalle', $this->detalle]);

        return $dataProvider;
    }
}
