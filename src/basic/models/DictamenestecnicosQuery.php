<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dictamenestecnicos]].
 *
 * @see Dictamenestecnicos
 */
class DictamenestecnicosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Dictamenestecnicos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Dictamenestecnicos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
