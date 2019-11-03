<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$formats = implode('|', $config->api->formats->toArray());

$manufacturerCollection = call_user_func(function($formats) use ($config) {
    $collection = new MicroCollection();
    $collection->setHandler('Forge\Controllers\ManufacturerController', true);
    $collection->setPrefix('/manufacturers');

    $routes = array(
        '/{name:([a-zA-Z0-9\_\-]+)}' => 'getSingleByName',
        '/{name:([a-zA-Z0-9\_\-]+)}/info' => 'getInfoByName',
        '/{id:([0-9]+)}' => 'getSingleById',
        '/{id:([0-9]+)}/info' => 'getInfoById',
        '' => 'getList',
    );

    foreach ($routes as $path => $method) {
        $collection->get("{$path}\.{format:({$formats})}", $method);
    }

    return $collection;
}, $formats);

$app->mount($manufacturerCollection);

$cpuSocketPackageCollection = call_user_func(function($formats) use ($config) {
    $collection = new MicroCollection();
    $collection->setHandler('Forge\Controllers\CpuSocketPackageController', true);
    $collection->setPrefix('/cpus/sockets/packages');

    $routes = array(
        '/{name:([a-zA-Z0-9\_\-]+)}' => 'getSingleByName',
        '/{name:([a-zA-Z0-9\_\-]+)}/info' => 'getInfoByName',
        '/{id:([0-9]+)}' => 'getSingleById',
        '/{id:([0-9]+)}/info' => 'getInfoById',
        '' => 'getList',
    );

    foreach ($routes as $path => $method) {
        $collection->get("{$path}\.{format:({$formats})}", $method);
    }

    return $collection;
}, $formats);

$app->mount($cpuSocketPackageCollection);

$cpuCodenameCollection = call_user_func(function($formats) use ($config) {
    $collection = new MicroCollection();
    $collection->setHandler('Forge\Controllers\CpuCodenameController', true);
    $collection->setPrefix('/cpus/codenames');

    $routes = array(
        '/{name:([a-zA-Z0-9\_\-]+)}' => 'getSingleByName',
        '/{name:([a-zA-Z0-9\_\-]+)}/info' => 'getInfoByName',
        '/{id:([0-9]+)}' => 'getSingleById',
        '/{id:([0-9]+)}/info' => 'getInfoById',
        '' => 'getList',
    );

    foreach ($routes as $path => $method) {
        $collection->get("{$path}\.{format:({$formats})}", $method);
    }

    return $collection;
}, $formats);

$app->mount($cpuCodenameCollection);
