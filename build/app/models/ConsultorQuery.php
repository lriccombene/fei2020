<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Consultor]].
 *
 * @see Consultor
 */
class ConsultorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Consultor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Consultor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
