<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notassalida".
 *
 * @property int $id
 * @property string|null $fec_emision
 * @property int $id_categoria
 * @property int $id_empresa
 * @property string|null $detalle
 * @property int|null $notificado
 * @property string|null $fec_notificado
 *
 * @property Categoria $categoria
 * @property Empresa $empresa
 */
class Notassalida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notassalida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec_emision', 'fec_notificado'], 'safe'],
            [['id_categoria', 'id_empresa'], 'required'],
            [['id_categoria', 'id_empresa', 'notificado'], 'integer'],
            [['detalle'], 'string'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fec_emision' => 'Fec Emision',
            'id_categoria' => 'Id Categoria',
            'id_empresa' => 'Id Empresa',
            'detalle' => 'Detalle',
            'notificado' => 'Notificado',
            'fec_notificado' => 'Fec Notificado',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriaQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery|EmpresaQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'id_empresa']);
    }

    /**
     * {@inheritdoc}
     * @return NotassalidaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotassalidaQuery(get_called_class());
    }
}
