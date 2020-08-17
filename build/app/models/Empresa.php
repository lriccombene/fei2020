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
 *
 * @property Actasinspeccion[] $actasinspeccions
 * @property Consultor $consultor
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
            [['id_consultor'], 'exist', 'skipOnError' => true, 'targetClass' => Consultor::className(), 'targetAttribute' => ['id_consultor' => 'id']],
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
     * Gets query for [[Actasinspeccions]].
     *
     * @return \yii\db\ActiveQuery|ActasinspeccionQuery
     */
    public function getActasinspeccions()
    {
        return $this->hasMany(Actasinspeccion::className(), ['id_empresa' => 'id']);
    }

    /**
     * Gets query for [[Consultor]].
     *
     * @return \yii\db\ActiveQuery|ConsultorQuery
     */
    public function getConsultor()
    {
        return $this->hasOne(Consultor::className(), ['id' => 'id_consultor']);
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
