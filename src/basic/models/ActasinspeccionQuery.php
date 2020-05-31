<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Actasinspeccion]].
 *
 * @see Actasinspeccion
 */
class ActasinspeccionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Actasinspeccion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Actasinspeccion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
