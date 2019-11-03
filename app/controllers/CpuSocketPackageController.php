<?php

namespace Forge\Controllers;

use Forge\Models\CpuSocketPackage as Package;

class CpuSocketPackageController extends ApiController
{
    public function getSingleByName($name, $format = 'json')
    {
        $get = Package::findFirstByPackage($name);

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
        $get = Package::findFirstByPackage($name);

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
        $get = Package::findFirst($id);

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
        $get = Package::findFirst($id);

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
        $get = Package::find([
            'order' => 'id ASC'
        ]);

        if ($get !== false) {
            return $get->toArray();
        }

        return array('error' => "Record not registered yet");
    }
}
