<?php

namespace app\modules\apv1\models;

class Residuos extends \app\models\Residuos
{
    public function fields (){
        return ['id', 'nombre','email','telefono','domicilio','nro','tiporesiduo'];
    }
}
