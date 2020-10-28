<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Actasinspeccion[] $actasinspeccions
 * @property Dictamentecnico[] $dictamentecnicos
 * @property Mesaentrada[] $mesaentradas
 * @property Notassalida[] $notassalidas
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
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
        return $this->hasMany(Actasinspeccion::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Dictamentecnicos]].
     *
     * @return \yii\db\ActiveQuery|DictamentecnicoQuery
     */
    public function getDictamentecnicos()
    {
        return $this->hasMany(Dictamentecnico::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Mesaentradas]].
     *
     * @return \yii\db\ActiveQuery|MesaentradaQuery
     */
    public function getMesaentradas()
    {
        return $this->hasMany(Mesaentrada::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Notassalidas]].
     *
     * @return \yii\db\ActiveQuery|NotassalidaQuery
     */
    public function getNotassalidas()
    {
        return $this->hasMany(Notassalida::className(), ['id_categoria' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriaQuery(get_called_class());
    }
}
