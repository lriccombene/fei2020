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
 * @property Actasinspecion[] $actasinspecions
 * @property Dictamentecnico[] $dictamenestecnicos
 * @property Mesadeentrada[] $mesadeentradas
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
     * Gets query for [[Actasinspecions]].
     *
     * @return \yii\db\ActiveQuery|ActasinspecionQuery
     */
    public function getActasinspecions()
    {
        return $this->hasMany(Actasinspecion::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Dictamentecnico]].
     *
     * @return \yii\db\ActiveQuery|DictamentecnicoQuery
     */
    public function getDictamenestecnicos()
    {
        return $this->hasMany(Dictamentecnico::className(), ['id_categoria' => 'id']);
    }

    /**
     * Gets query for [[Mesadeentradas]].
     *
     * @return \yii\db\ActiveQuery|MesadeentradaQuery
     */
    public function getMesadeentradas()
    {
        return $this->hasMany(Mesadeentrada::className(), ['id_categoria' => 'id']);
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
