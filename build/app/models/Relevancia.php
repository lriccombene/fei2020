<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relevancia".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Enviosdocumentacion[] $enviosdocumentacions
 */
class Relevancia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'relevancia';
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
     * Gets query for [[Enviosdocumentacions]].
     *
     * @return \yii\db\ActiveQuery|EnviosdocumentacionQuery
     */
    public function getEnviosdocumentacions()
    {
        return $this->hasMany(Enviosdocumentacion::className(), ['id_relevancia' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RelevanciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RelevanciaQuery(get_called_class());
    }
}
