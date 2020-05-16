<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dictamenestecnicos".
 *
 * @property int $id
 * @property string|null $fec
 * @property int $nro
 * @property int $id_categoria
 * @property int $id_empresa
 * @property int $id_area
 * @property int $id_yasicmiento
 * @property int $id_tipodictamente
 * @property int $id_tipotrabajo
 * @property string|null $detalle
 * @property int|null $longitud
 * @property int|null $latitud
 *
 * @property Area $area
 * @property Categoria $categoria
 * @property Empresa $empresa
 */
class Dictamenestecnicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dictamenestecnicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec'], 'safe'],
            [['nro', 'id_categoria', 'id_empresa', 'id_area', 'id_yasicmiento', 'id_tipodictamente', 'id_tipotrabajo'], 'required'],
            [['nro', 'id_categoria', 'id_empresa', 'id_area', 'id_yasicmiento', 'id_tipodictamente', 'id_tipotrabajo', 'longitud', 'latitud'], 'integer'],
            [['detalle'], 'string'],
            [['id_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['id_area' => 'id']],
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
            'fec' => 'Fec',
            'nro' => 'Nro',
            'id_categoria' => 'Id Categoria',
            'id_empresa' => 'Id Empresa',
            'id_area' => 'Id Area',
            'id_yasicmiento' => 'Id Yasicmiento',
            'id_tipodictamente' => 'Id Tipodictamente',
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
     * @return DictamenestecnicosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DictamenestecnicosQuery(get_called_class());
    }
}
