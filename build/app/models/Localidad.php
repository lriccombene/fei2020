<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidad".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Actasinspeccion[] $actasinspeccions
 */
class Localidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localidad';
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
     * Gets query for [[Actasinspeccions]].
     *
     * @return \yii\db\ActiveQuery|ActasinspeccionQuery
     */
    public function getActasinspeccions()
    {
        return $this->hasMany(Actasinspeccion::className(), ['id_localidad' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LocalidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocalidadQuery(get_called_class());
    }
}
