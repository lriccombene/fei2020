<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dictamentecnico".
 *
 * @property int $id
 * @property string|null $fec
 * @property int $nro
 * @property int $id_categoria
 * @property int $id_empresa
 * @property int $id_area
 * @property int $id_yacimiento
 * @property int $id_tipodictamen
 * @property int $id_tipotrabajo
 * @property string|null $detalle
 * @property int|null $longitud
 * @property int|null $latitud
 *
 * @property Area $area
 * @property Categorium $categoria
 * @property Empresa $empresa
 * @property Tipodictaman $tipodictamen
 * @property Tipotrabajo $tipotrabajo
 * @property Yacimiento $yacimiento
 */
class Dictamentecnico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictamentecnico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec'], 'safe'],
            [['nro', 'id_categoria', 'id_empresa', 'id_area', 'id_yacimiento', 'id_tipodictamen', 'id_tipotrabajo'], 'required'],
            [['nro', 'id_categoria', 'id_empresa', 'id_area', 'id_yacimiento', 'id_tipodictamen', 'id_tipotrabajo', 'longitud', 'latitud'], 'integer'],
            [['detalle'], 'string'],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorium::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
            [['id_tipodictamen'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodictaman::className(), 'targetAttribute' => ['id_tipodictamen' => 'id']],
            [['id_tipotrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipotrabajo::className(), 'targetAttribute' => ['id_tipotrabajo' => 'id']],
            [['id_yacimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Yacimiento::className(), 'targetAttribute' => ['id_yacimiento' => 'id']],
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
            'nro' => 'Nro',
            'id_categoria' => 'Id Categoria',
            'id_empresa' => 'Id Empresa',
            'id_area' => 'Id Area',
            'id_yacimiento' => 'Id Yacimiento',
            'id_tipodictamen' => 'Id Tipodictamen',
            'id_tipotrabajo' => 'Id Tipotrabajo',
            'detalle' => 'Detalle',
            'longitud' => 'Longitud',
            'latitud' => 'Latitud',
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
     * @return \yii\db\ActiveQuery|CategoriumQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorium::className(), ['id' => 'id_categoria']);
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
     * Gets query for [[Tipodictamen]].
     *
     * @return \yii\db\ActiveQuery|TipodictamanQuery
     */
    public function getTipodictamen()
    {
        return $this->hasOne(Tipodictaman::className(), ['id' => 'id_tipodictamen']);
    }

    /**
     * Gets query for [[Tipotrabajo]].
     *
     * @return \yii\db\ActiveQuery|TipotrabajoQuery
     */
    public function getTipotrabajo()
    {
        return $this->hasOne(Tipotrabajo::className(), ['id' => 'id_tipotrabajo']);
    }

    /**
     * Gets query for [[Yacimiento]].
     *
     * @return \yii\db\ActiveQuery|YacimientoQuery
     */
    public function getYacimiento()
    {
        return $this->hasOne(Yacimiento::className(), ['id' => 'id_yacimiento']);
    }

    /**
     * {@inheritdoc}
     * @return DictamentecnicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DictamentecnicoQuery(get_called_class());
    }
}
