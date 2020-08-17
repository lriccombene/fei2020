<?php

namespace app\modules\apv1\models;

class Notassalida extends \app\models\Notassalida
{
    public function fields (){
        return ['id','fec_emision','fec_notificado','detalle','notificado','categoria','empresa'];
    }

    public function extraFields(){
        return [ 'id_categoria','id_empresa' ]; 
    }
}