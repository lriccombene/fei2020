<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mesaentrada".
 *
 * @property int $id
 * @property string $fec
 * @property string|null $fec_ingreso
 * @property int $id_categoria
 * @property int $id_tramite
 * @property string|null $descripcion
 * @property int $id_empresa
 *
 * @property Categoria $categoria
 * @property Empresa $empresa
 * @property Tipotramite $tramite
 */
class Mesaentrada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mesaentrada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fec', 'id_categoria', 'id_tramite', 'id_empresa'], 'required'],
            [['fec', 'fec_ingreso'], 'safe'],
            [['id_categoria', 'id_tramite', 'id_empresa'], 'integer'],
            [['descripcion'], 'string'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['id_empresa' => 'id']],
            [['id_tramite'], 'exist', 'skipOnError' => true, 'targetClass' => Tipotramite::className(), 'targetAttribute' => ['id_tramite' => 'id']],
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
            'fec_ingreso' => 'Fec Ingreso',
            'id_categoria' => 'Id Categoria',
            'id_tramite' => 'Id Tramite',
            'descripcion' => 'Descripcion',
            'id_empresa' => 'Id Empresa',
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
     * Gets query for [[Tramite]].
     *
     * @return \yii\db\ActiveQuery|TipotramiteQuery
     */
    public function getTramite()
    {
        return $this->hasOne(Tipotramite::className(), ['id' => 'id_tramite']);
    }

    /**
     * {@inheritdoc}
     * @return MesaentradaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MesaentradaQuery(get_called_class());
    }
}
