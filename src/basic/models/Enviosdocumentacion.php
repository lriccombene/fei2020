<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enviosdocumentacion".
 *
 * @property int $id
 * @property string|null $fec
 * @property string|null $transporte
 * @property int $id_relevancia
 * @property string|null $detalle
 * @property string|null $archivo_urlnotificado
 * @property string|null $destino
 * @property string|null $fec_notificado
 *
 * @property Relevancia $relevancia
 */
class Enviosdocumentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enviosdocumentacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec', 'fec_notificado'], 'safe'],
            [['id_relevancia'], 'required'],
            [['id_relevancia'], 'integer'],
            [['detalle'], 'string'],
            [['transporte', 'archivo_urlnotificado', 'destino'], 'string', 'max' => 255],
            [['id_relevancia'], 'exist', 'skipOnError' => true, 'targetClass' => Relevancia::className(), 'targetAttribute' => ['id_relevancia' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fec' => 'Fec',
            'transporte' => 'Transporte',
            'id_relevancia' => 'Id Relevancia',
            'detalle' => 'Detalle',
            'archivo_urlnotificado' => 'Archivo Urlnotificado',
            'destino' => 'Destino',
            'fec_notificado' => 'Fec Notificado',
        ];
    }

    /**
     * Gets query for [[Relevancia]].
     *
     * @return \yii\db\ActiveQuery|RelevanciaQuery
     */
    public function getRelevancia()
    {
        return $this->hasOne(Relevancia::className(), ['id' => 'id_relevancia']);
    }

    /**
     * {@inheritdoc}
     * @return EnviosdocumentacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EnviosdocumentacionQuery(get_called_class());
    }
}
