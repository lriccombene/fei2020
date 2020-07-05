<?php

namespace app\modules\apv1\models;

class Dictamentecnico extends \app\models\Dictamentecnico
{
    public function fields (){
        return ['id','fec','nro','categoria','empresa','area','yacimiento','tipodictamente','tipotrabajo','detalle',
                'longitud','latitud'];
    }

    public function extraFields(){
        return [ 'categoria', 'empresa', 'area','yacimiento','tipodictamente' ]; 
    }
}