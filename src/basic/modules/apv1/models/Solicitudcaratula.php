<?php

namespace app\modules\apv1\models;

class Solicitudcaratula extends \app\models\Solicitudcaratula
{
    public function fields (){
        return ['id', 'fec','extracto','recibido'];
    }
}