<?php

namespace app\modules\apv1\models;

class Notassalida extends \app\models\Notassalida
{
    public function fields (){
        return ['id','fec_emision','detalle','notificado','fec_notificado'];
    }

    public function extraFields(){
        return [ 'id_categoria','id_empresa' ]; 
    }
}