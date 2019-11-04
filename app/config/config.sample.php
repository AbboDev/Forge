<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'root',
        'password'   => '',
        'dbname'     => 'test',
        'charset'    => 'utf8',
    ],

    'application' => [
        'appDir'         => APP_PATH . '/',
        'consoleDir'     => APP_PATH . '/console/',
        'commandsDir'    => APP_PATH . '/console/commands',
        'databaseDir'    => APP_PATH . '/database/',
        'migrationsDir'  => APP_PATH . '/database/migrations/',

        'controllersDir' => APP_PATH . '/controllers/',
        'routesDir'      => APP_PATH . '/routes/',
        'modelsDir'      => APP_PATH . '/models/',
        'viewsDir'       => APP_PATH . '/views/',
        'baseUri'        => '/forge/',
    ],

    'namespaces' => [
        'root' => '',
    ]

    'api' => [
        'versions' => [
            'last' => 1
        ],
        'formats' => [
            'json',
            'xml',
            'txt',
            'html',
            'md',
            'csv',
            'yaml'
        ]
    ]
]);
