<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enviosdocumentacion;

/**
 * EnviosdocumentacionSearch represents the model behind the search form of `app\models\Enviosdocumentacion`.
 */
class EnviosdocumentacionSearch extends Enviosdocumentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_relevancia'], 'integer'],
            [['fec', 'transporte', 'detalle', 'archivo_urlnotificado', 'destino', 'fec_notificado'], 'safe'],
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
        $query = Enviosdocumentacion::find();

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
            'id_relevancia' => $this->id_relevancia,
            'fec_notificado' => $this->fec_notificado,
        ]);

        $query->andFilterWhere(['like', 'transporte', $this->transporte])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'archivo_urlnotificado', $this->archivo_urlnotificado])
            ->andFilterWhere(['like', 'destino', $this->destino]);

        return $dataProvider;
    }
}
