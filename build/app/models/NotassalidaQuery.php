<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Notassalida]].
 *
 * @see Notassalida
 */
class NotassalidaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Notassalida[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Notassalida|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
