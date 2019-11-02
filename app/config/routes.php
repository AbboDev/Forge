<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;

$manufacturerCollection = new MicroCollection();
$manufacturerCollection->setHandler('Forge\Controllers\ManufacturerController', true);
$manufacturerCollection->setPrefix('/manufacturer');

$manufacturerCollection->get('/', 'index');

$manufacturerCollection->get("/{name:([a-zA-Z0-9\_\-]+)}/?{format:(json|xml|te?xt|x?html|m(ark)?d(own)?|ya?ml)?}", 'getSingleByName');
$manufacturerCollection->get("/{name:([a-zA-Z0-9\_\-]+)}/info/?{format:(json|xml|te?xt|x?html|m(ark)?d(own)?|ya?ml)?}", 'getInfoByName');

$manufacturerCollection->get("/{id:([0-9]+)}/?{format:(json|xml|te?xt|x?html|m(ark)?d(own)?|ya?ml)?}", 'getSingleById');
$manufacturerCollection->get("/{id:([0-9]+)}/info/?{format:(json|xml|te?xt|x?html|m(ark)?d(own)?|ya?ml)?}", 'getInfoById');

$manufacturerCollection->get("/@/?{format:(json|xml|te?xt|x?html|m(ark)?d(own)?|ya?ml)?}", 'getList');

$app->mount($manufacturerCollection);
