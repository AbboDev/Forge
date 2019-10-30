<?php

namespace Forge\Controllers;

class ManufacturerController extends ApiController
{
    public function index()
    {
        echo "index()";
    }

    public function getSingleByName($name)
    {
        return array("getSingleByName({$name})");
    }

    public function getInfoByName($name)
    {
        return array("getInfoByName({$name})");
    }

    public function getSingleById($id)
    {
        return array("getSingleById({$id})");
    }

    public function getInfoById($id)
    {
        return array("getInfoById({$id})");
    }

    public function getList()
    {
        return array("getList()");
    }
}
