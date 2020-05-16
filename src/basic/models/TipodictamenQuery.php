<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tipodictamen]].
 *
 * @see Tipodictamen
 */
class TipodictamenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tipodictamen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tipodictamen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
