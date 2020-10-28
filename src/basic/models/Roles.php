<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $tipo
 * @property int $id_usuario
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'tipo', 'id_usuario'], 'required'],
            [['tipo', 'id_usuario'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 200],
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
            'tipo' => 'Tipo',
            'id_usuario' => 'Id Usuario',
        ];
    }
}
