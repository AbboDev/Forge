<?php

namespace Forge\Controllers;

class ManufacturerController extends ApiController
{
    public function index()
    {
        echo "index()";
    }

    public function getSingleByName($name, $format = 'json')
    {
        return array("getSingleByName", $name, $format);
    }

    public function getInfoByName($name, $format = 'json')
    {
        return array("getInfoByName", $name, $format);
    }

    public function getSingleById($id, $format = 'json')
    {
        return array("getSingleById", $id, $format);
    }

    public function getInfoById($id, $format = 'json')
    {
        return array("getInfoById", $id, $format);
    }

    public function getList($format = 'json')
    {
        return array("getList", $format);
    }
}
