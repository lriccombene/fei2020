<?php

namespace app\modules\apv1\models;

class Dictamenestecnicos extends \app\models\Dictamenestecnicos
{
    public function fields (){
        return ['fec','nro','id_categoria','id_empresa','id_area','id_tipotrabajo','detalle','longitud','latitud'];
    }

    public function extraFields(){
        return [ 'categoria', 'empresa', 'area','yasicmiento','tipodictamente' ]; 
    }
}