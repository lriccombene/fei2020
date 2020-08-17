<?php

namespace app\modules\apv1\models;

class Tipotrabajo extends \app\models\TipotrabajoSearch
{
    public function fields (){
        return ['id', 'nombre','descripcion'];
    }
}