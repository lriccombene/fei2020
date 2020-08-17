<?php

namespace app\modules\apv1\models;

use yii\data\ActiveDataProvider;


/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class EmpresaSearch extends \app\modules\apv1\models\Empresa
{

    public function fields()
    {
        return parent::fields(); // TODO: Change the autogenerated stub
    }
//    public function fields()
//    {
//        return ['id','title','comments']; // TODO: Change the autogenerated stub
//    }

    public $consultor;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id','nombre','descripcion','razon_social','contacto','referente','consultor'], 'safe'],
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
        $query = Empresa::find();
        $query->joinWith('consultor');

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

        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);
        $query->andFilterWhere(['like','razon_social',$this->razon_social]);   
        
        $query->andFilterWhere(['like','consultor.nombre',$this->consultor]);
        return $dataProvider;
    }
}