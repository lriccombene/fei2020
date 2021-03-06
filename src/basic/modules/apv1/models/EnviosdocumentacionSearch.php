<?php

namespace app\modules\apv1\models;

use yii\data\ActiveDataProvider;


/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class EnviosdocumentacionSearch extends \app\modules\apv1\models\Enviosdocumentacion
{

    public function fields()
    {
        return parent::fields(); // TODO: Change the autogenerated stub
    }
//    public function fields()
//    {
//        return ['id','title','comments']; // TODO: Change the autogenerated stub
//    }

    public $relevancia;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id','fec','transporte','detalle','archivo_urlnotificado','destino','fec_notificado','relevancia'], 'safe'],
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
        $query = Enviosdocumentacion::find();
        $query->joinWith('relevancia');

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

        $query->andFilterWhere(['like', 'fec', $this->fec])
            ->andFilterWhere(['like', 'detalle', $this->destino])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'detalle', $this->fec_notificado]);
        
        $query->andFilterWhere(['like','relevancia.nombre',$this->relevancia]);
        return $dataProvider;
    }
}
