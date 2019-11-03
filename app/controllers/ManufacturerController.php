<?php

namespace Forge\Controllers;

use Forge\Models\Manufacturer;

class ManufacturerController extends ApiController
{
    public function index()
    {
        echo "index()";
    }

    public function getSingleByName($name, $format = 'json')
    {
        $get = Manufacturer::findFirstByManufacturer($name);

        if ($get !== false) {
            return $get->toArray();
        }

        return array(
            'error' => "No record not found for key '{$name}'",
            'name' => $name
        );
    }

    public function getInfoByName($name, $format = 'json')
    {
        $get = Manufacturer::findFirstByManufacturer($name);

        if ($get !== false) {
            return $get->toArray();
        }

        return array(
            'error' => "No record not found for key '{$name}'",
            'name' => $name
        );
    }

    public function getSingleById($id, $format = 'json')
    {
        $get = Manufacturer::findFirst($id);

        if ($get !== false) {
            return $get->toArray();
        }

        return array(
            'error' => "No record not found for id '{$id}'",
            'id' => $id
        );
    }

    public function getInfoById($id, $format = 'json')
    {
        $get = Manufacturer::findFirst($id);

        if ($get !== false) {
            return $get->toArray();
        }

        return array(
            'error' => "No record not found for id '{$id}'",
            'id' => $id
        );
    }

    public function getList($format = 'json')
    {
        $get = Manufacturer::find([
            'order' => 'id ASC'
        ]);

        if ($get !== false) {
            return $get->toArray();
        }

        return array('error' => "Record not registered yet");
    }
}
