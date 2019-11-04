<?php

namespace Forge\Routes;

use Phalcon\Mvc\Micro\Collection as MicroCollection;

class ApiRoute extends MicroCollection
{
    protected $version;

    public function __construct()
    {
        $formats = implode('|', config('api.formats', array('json'))->toArray());

        $routes = array(
            '/{name:([a-zA-Z0-9\_\-]+)}' => 'getSingleByName',
            '/{name:([a-zA-Z0-9\_\-]+)}/info' => 'getInfoByName',
            '/{id:([0-9]+)}' => 'getSingleById',
            '/{id:([0-9]+)}/info' => 'getInfoById',
            '' => 'getList',
        );

        foreach ($routes as $path => $method) {
            $this->get("{$path}\.{format:({$formats})}", $method);
        }
    }

    public function getVersion($version)
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        if (!is_integer($version)) {
            throw new Exception('The version number must be an integer');
        }

        $this->version = $version;
    }

    public function setHandler($handler, $lazy = true)
    {
        if (is_string($handler)) {
            $handler = "Forge\\Controllers\\{$handler}";
        }

        parent::setHandler($handler, $lazy);
    }

    public function setPrefix($prefix)
    {
        if (is_string($prefix)) {
            $version = config('api.versions.last', $this->version);

            $prefix = "/api/v{$version}{$prefix}";
        }

        parent::setPrefix($prefix);
    }
}
