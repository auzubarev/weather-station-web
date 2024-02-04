<?php
require_once __DIR__ . '/config.php';

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'production',
        'production' => [
            'adapter' => 'mysql',
            'host' => MYSQL_HOST,
            'name' => MYSQL_DB,
            'user' => MYSQL_LOGIN,
            'pass' => MYSQL_PASSWORD,
            'port' => MYSQL_PORT,
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
