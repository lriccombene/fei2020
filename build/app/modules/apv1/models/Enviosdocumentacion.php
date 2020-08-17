<?php

namespace app\modules\apv1\models;

class Enviosdocumentacion extends \app\models\Enviosdocumentacion
{
    public function fields (){
        return ['id','fec','transporte','detalle','archivo_urlnotificado','destino','fec_notificado','relevancia'];
    }

    public function extraFields(){
        return [ 'relevancia' ]; 
    }
}

