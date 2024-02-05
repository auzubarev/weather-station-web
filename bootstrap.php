<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => MYSQL_HOST,
    'database' => MYSQL_DB,
    'username' => MYSQL_LOGIN,
    'password' => MYSQL_PASSWORD,
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
]);
$capsule->bootEloquent();
$capsule->setAsGlobal();