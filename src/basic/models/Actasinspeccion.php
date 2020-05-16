<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actasinspeccion".
 *
 * @property int $id
 * @property int $nro
 * @property string|null $fec
 * @property int $id_localidad
 * @property int $id_categoria
 * @property int $id_motivo
 * @property int $id_empresa
 * @property int $id_area
 * @property int|null $latitud
 * @property int|null $longitud
 *
 * @property Area $area
 * @property Categoria $categoria
 * @property Empresa $empresa
 * @property Localidad $localidad
 * @property Motivo $motivo
 */
class Actasinspeccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actasinspeccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nro', 'id_localidad', 'id_categoria', 'id_motivo', 'id_empresa', 'id_area'], 'required'],
            [['nro', 'id_localidad', 'id_categoria', 'id_motivo', 'id_empresa', 'id_area', 'latitud', 'longitud'], 'integer'],
            [['fec'], 'safe'],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
            [['id_localidad'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['id_localidad' => 'id']],
            [['id_motivo'], 'exist', 'skipOnError' => true, 'targetClass' => Motivo::className(), 'targetAttribute' => ['id_motivo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro' => 'Nro',
            'fec' => 'Fec',
            'id_localidad' => 'Id Localidad',
            'id_categoria' => 'Id Categoria',
            'id_motivo' => 'Id Motivo',
            'id_empresa' => 'Id Empresa',
            'id_area' => 'Id Area',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery|AreaQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'id_area']);
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
     * Gets query for [[Localidad]].
     *
     * @return \yii\db\ActiveQuery|LocalidadQuery
     */
    public function getLocalidad()
    {
        return $this->hasOne(Localidad::className(), ['id' => 'id_localidad']);
    }

    /**
     * Gets query for [[Motivo]].
     *
     * @return \yii\db\ActiveQuery|MotivoQuery
     */
    public function getMotivo()
    {
        return $this->hasOne(Motivo::className(), ['id' => 'id_motivo']);
    }

    /**
     * {@inheritdoc}
     * @return ActasinspeccionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActasinspeccionQuery(get_called_class());
    }
}
