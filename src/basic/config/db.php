<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.$_ENV['DB_DATABASE'] .';dbname='.$_ENV['DB_PASSWORD'],
    'username' => 'root',
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
