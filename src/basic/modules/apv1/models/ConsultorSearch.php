<?php

namespace app\modules\apv1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consultor;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class ConsultorSearch extends \app\modules\apv1\models\Consultor
{

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
//    public function rules()
//    {
//        return [
////            [['id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
//            [['id','title', 'body','comments'], 'safe'],
//        ];
//    }

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
        $query = Consultor::find();
//        $query->joinWith('comments');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params,'');

//        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
//            return $dataProvider;
//        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,

        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
              ->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'nro', $this->nro])
              ->andFilterWhere(['like', 'fecregistro', $this->fecregistro])
              ->andFilterWhere(['like', 'apellido', $this->apellido]);

        return $dataProvider;
    }
}
