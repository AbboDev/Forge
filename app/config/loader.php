<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

// $loader->registerDirs([
//     $config->application->modelsDir
// ]);

$loader->registerNamespaces([
    'Forge' => $config->application->appDir,

    'Forge\Models' => $config->application->modelsDir,
    'Forge\Controllers' => $config->application->controllersDir,

    'Forge\Routes' => $config->application->routesDir,

    'Forge\Console' => $config->application->consoleDir,
    'Forge\Console\Command' => $config->application->commandsDir,
    'Forge\Database' => $config->application->databaseDir,
    'Forge\Database\Migrations' => $config->application->migrationsDir,
]);

$loader->registerFiles([BASE_PATH . '/vendor/autoload.php']);

$loader->register();
