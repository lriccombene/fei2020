<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Enviosdocumentacion]].
 *
 * @see Enviosdocumentacion
 */
class EnviosdocumentacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Enviosdocumentacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Enviosdocumentacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
