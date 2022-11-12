<?php

return [ 
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1:8889;dbname=address_book',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8', 
   /*  'db1'=>[
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=all',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ],
    'db2'=>[
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=all-india',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ] */

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
