<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Relevancia]].
 *
 * @see Relevancia
 */
class RelevanciaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Relevancia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Relevancia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
