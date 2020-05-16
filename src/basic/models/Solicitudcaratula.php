<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudcaratula".
 *
 * @property int $id
 * @property string $fec
 * @property string|null $extracto
 * @property string|null $recibido
 */
class Solicitudcaratula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solicitudcaratula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec'], 'required'],
            [['fec'], 'safe'],
            [['extracto', 'recibido'], 'string', 'max' => 255],
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
            'extracto' => 'Extracto',
            'recibido' => 'Recibido',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SolicitudcaratulaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SolicitudcaratulaQuery(get_called_class());
    }
}
