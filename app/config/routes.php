<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$manufacturerCollection = new MicroCollection();
$manufacturerCollection->setHandler('Forge\Controllers\ManufacturerController', true);
$manufacturerCollection->setPrefix('/manufacturer');

$manufacturerCollection->get('/', 'index');

$manufacturerCollection->get('/{name:([a-zA-Z0-9\_\-]+)}', 'getSingleByName');
$manufacturerCollection->get('/{name:([a-zA-Z0-9\_\-]+)}/info', 'getInfoByName');

$manufacturerCollection->get('/{id:([0-9]+)}', 'getSingleById');
$manufacturerCollection->get('/{id:([0-9]+)}/info', 'getInfoById');

$manufacturerCollection->get('/all', 'getList');

$app->mount($manufacturerCollection);
