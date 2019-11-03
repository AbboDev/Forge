<?php

namespace Forge\Controllers;

use Forge\Models\CpuCodename as Codename;

class CpuCodenameController extends ApiController
{
    public function getSingleByName($name, $format = 'json')
    {
        $get = Codename::findFirstByCodename($name);

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
        $get = Codename::findFirstByCodename($name);

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
        $get = Codename::findFirst($id);

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
        $get = Codename::findFirst($id);

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
        $get = Codename::find([
            'order' => 'id ASC'
        ]);

        if ($get !== false) {
            return $get->toArray();
        }

        return array('error' => "Record not registered yet");
    }
}

