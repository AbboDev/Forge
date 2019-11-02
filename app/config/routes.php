<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$formats = implode('|', $config->api->formats->toArray());

$manufacturerCollection = call_user_func(function($formats) use ($config) {
    $collection = new MicroCollection();
    $collection->setHandler('Forge\Controllers\ManufacturerController', true);
    $collection->setPrefix('/manufacturer');

    $collection->get('/', 'index');

    $routes = array(
        '{name:([a-zA-Z0-9\_\-]+)}' => 'getSingleByName',
        '{name:([a-zA-Z0-9\_\-]+)}/info' => 'getInfoByName',
        '{id:([0-9]+)}' => 'getSingleById',
        '{id:([0-9]+)}/info' => 'getInfoById',
        $config->api->all_alias => 'getList',
    );

    foreach ($routes as $path => $method) {
        $collection->get("/{$path}/?{format:({$formats})?}", $method);
    }

    return $collection;
}, $formats);

$app->mount($manufacturerCollection);
