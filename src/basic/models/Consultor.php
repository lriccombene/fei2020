<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consultor".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $apellido
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $domicilio
 * @property integer|null $nro
 *
 * @property Empresa[] $empresas
 */
class Consultor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nro'], 'integer'],
            [['nombre', 'apellido', 'telefono', 'email', 'domicilio'], 'string', 'max' => 255],
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
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'domicilio' => 'Domicilio',
            'nro'=>'Nro Registro'
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery|EmpresaQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['id_consultor' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConsultorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConsultorQuery(get_called_class());
    }
}
