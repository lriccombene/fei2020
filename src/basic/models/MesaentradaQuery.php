<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Mesaentrada]].
 *
 * @see Mesaentrada
 */
class MesaentradaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Mesaentrada[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Mesaentrada|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
