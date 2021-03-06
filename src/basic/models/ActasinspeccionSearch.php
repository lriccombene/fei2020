<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actasinspeccion;

/**
 * ActasinspeccionSearch represents the model behind the search form of `app\models\Actasinspeccion`.
 */
class ActasinspeccionSearch extends Actasinspeccion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro', 'id_localidad', 'id_categoria', 'id_motivo', 'id_empresa', 'id_area', 'latitud', 'longitud'], 'integer'],
            [['fec'], 'safe'],
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
        $query = Actasinspeccion::find();
        $query->joinWith('localidad');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params,'');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nro' => $this->nro,
            'fec' => $this->fec,
            'id_categoria' => $this->id_categoria,
            'id_motivo' => $this->id_motivo,
            'id_empresa' => $this->id_empresa,
            'id_area' => $this->id_area,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
        ]);
        $query->andFilterWhere(['like','localidad.nombre',$this->id_localidad]);

        return $dataProvider;
    }
}
