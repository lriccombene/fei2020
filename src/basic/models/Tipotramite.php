<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipotramite".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Mesaentrada[] $mesaentradas
 */
class Tipotramite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipotramite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Mesaentradas]].
     *
     * @return \yii\db\ActiveQuery|MesaentradaQuery
     */
    public function getMesaentradas()
    {
        return $this->hasMany(Mesaentrada::className(), ['id_tramite' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TipotramiteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipotramiteQuery(get_called_class());
    }
}
