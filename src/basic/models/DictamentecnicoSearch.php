<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dictamentecnico;

/**
 * DictamentecnicoSearch represents the model behind the search form of `app\models\Dictamentecnico`.
 */
class DictamentecnicoSearch extends Dictamentecnico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro', 'id_categoria', 'id_empresa', 'id_area', 'id_yacimiento', 'id_tipodictamen', 'id_tipotrabajo'], 'integer'],
            [['fec', 'detalle', 'longitud', 'latitud'], 'safe'],
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
        $query = Dictamentecnico::find();

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
            'nro' => $this->nro,
            'id_categoria' => $this->id_categoria,
            'id_empresa' => $this->id_empresa,
            'id_area' => $this->id_area,
            'id_yacimiento' => $this->id_yacimiento,
            'id_tipodictamen' => $this->id_tipodictamen,
            'id_tipotrabajo' => $this->id_tipotrabajo,
            'longitud' => $this->longitud,
            'latitud' => $this->latitud,
        ]);

        $query->andFilterWhere(['like', 'detalle', $this->detalle]);

        return $dataProvider;
    }
}
