<?php

namespace app\modules\apv1\models;

use yii\data\ActiveDataProvider;

class MesaentradaSearch extends \app\models\Mesaentrada
{
    public $categoria;
    public $empresa;
    public $tramite;

    public function fields()
    {
        return parent::fields(); // TODO: Change the autogenerated stub
    }
//    public function fields()
//    {
//        return ['id','title','comments']; // TODO: Change the autogenerated stub
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id','fec','fec_ingreso','categoria','empresa','tramite','descripcion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
//    public function scenarios()
//    {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }

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

        $query->joinWith('categoria');
        $query->joinWith('empresa');


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
        ]);
        $query->andFilterWhere(['like', 'fec', $this->fec])
            ->andFilterWhere(['like', 'fec_ingreso', $this->fec_ingreso]);
        $query->andFilterWhere(['like','categoria.nombre',$this->categoria]);
        return $dataProvider;
    }
}