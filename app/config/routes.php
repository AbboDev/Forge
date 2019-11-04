<?php

$manufacturerCollection = new \Forge\Routes\ApiRoute();
$manufacturerCollection->setHandler('ManufacturerController');
$manufacturerCollection->setPrefix('/manufacturers');

$app->mount($manufacturerCollection);

$cpuSocketCollection = new \Forge\Routes\ApiRoute();
$cpuSocketCollection->setHandler('CpuSocketController');
$cpuSocketCollection->setPrefix('/cpus/sockets');

$app->mount($cpuSocketCollection);

$cpuSocketPackageCollection = new \Forge\Routes\ApiRoute();
$cpuSocketPackageCollection->setHandler('CpuSocketPackageController');
$cpuSocketPackageCollection->setPrefix('/cpus/sockets/packages');

$app->mount($cpuSocketPackageCollection);

$cpuCodenameCollection = new \Forge\Routes\ApiRoute();
$cpuCodenameCollection->setHandler('CpuCodenameController');
$cpuCodenameCollection->setPrefix('/cpus/codenames');

$app->mount($cpuCodenameCollection);

$cpuSeriesCollection = new \Forge\Routes\ApiRoute();
$cpuSeriesCollection->setHandler('CpuSeriesController');
$cpuSeriesCollection->setPrefix('/cpus/series');

$app->mount($cpuSeriesCollection);
