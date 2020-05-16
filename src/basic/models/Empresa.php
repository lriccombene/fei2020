<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $id_consultor
 * @property string|null $razon_social
 * @property string|null $contacto
 * @property string|null $referente
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_consultor'], 'required'],
            [['id_consultor'], 'integer'],
            [['nombre', 'descripcion', 'razon_social', 'contacto', 'referente'], 'string', 'max' => 255],
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
            'id_consultor' => 'Id Consultor',
            'razon_social' => 'Razon Social',
            'contacto' => 'Contacto',
            'referente' => 'Referente',
        ];
    }

    /**
     * {@inheritdoc}
     * @return EmpresaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpresaQuery(get_called_class());
    }
}
