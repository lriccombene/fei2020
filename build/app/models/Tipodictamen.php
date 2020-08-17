<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipodictamen".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Dictamentecnico[] $dictamentecnicos
 */
class Tipodictamen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipodictamen';
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
     * Gets query for [[Dictamentecnicos]].
     *
     * @return \yii\db\ActiveQuery|DictamentecnicoQuery
     */
    public function getDictamentecnicos()
    {
        return $this->hasMany(Dictamentecnico::className(), ['id_tipodictamen' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TipodictamenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipodictamenQuery(get_called_class());
    }
}
