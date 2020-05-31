<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipotrabajo".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 */
class Tipotrabajo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipotrabajo';
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
     * {@inheritdoc}
     * @return TipotrabajoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipotrabajoQuery(get_called_class());
    }
}
