<?php

namespace Forge\Controllers;

use Forge\Models\CpuSocket as Socket;

class CpuSocketController extends ApiController
{
    public function getSingleByName($name, $format = 'json')
    {
        $get = Socket::findFirstBySocket($name);

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
        $get = Socket::findFirstBySocket($name);

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
        $get = Socket::findFirst($id);

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
        $get = Socket::findFirst($id);

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
        $get = Socket::find([
            'order' => 'id ASC'
        ]);

        if ($get !== false) {
            return $get->toArray();
        }

        return array('error' => "Record not registered yet");
    }
}
