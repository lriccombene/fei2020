<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "residuos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $cuit
 * @property string|null $tiporesiduo
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $domicilio
 * @property int|null $nro
 */
class Residuos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'residuos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nro'], 'integer'],
            [['nombre', 'cuit', 'tiporesiduo', 'telefono', 'email', 'domicilio'], 'string', 'max' => 255],
            [['nro'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre / Razon Social',
            'cuit' => 'Cuit',
            'tiporesiduo' => 'Tipo Residuo',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'domicilio' => 'Domicilio',
            'nro' => 'Nro',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ResiduosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResiduosQuery(get_called_class());
    }
}
