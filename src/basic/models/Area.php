<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Actasinspecion[] $actasinspecions
 * @property Dictamentecnico[] $dictamenestecnicos
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
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
     * Gets query for [[Actasinspecions]].
     *
     * @return \yii\db\ActiveQuery|ActasinspecionQuery
     */
    public function getActasinspecions()
    {
        return $this->hasMany(Actasinspecion::className(), ['id_area' => 'id']);
    }

    /**
     * Gets query for [[Dictamentecnico]].
     *
     * @return \yii\db\ActiveQuery|DictamentecnicoQuery
     */
    public function getDictamenestecnicos()
    {
        return $this->hasMany(Dictamentecnico::className(), ['id_area' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AreaQuery(get_called_class());
    }
}
