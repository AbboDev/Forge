<?php

namespace Forge\Controllers;

// https://forum.phalcon.io/discussion/22/the-best-way-for-json-response-

abstract class ApiController extends \Phalcon\Mvc\Controller
{
    abstract public function getSingleByName($name);

    abstract public function getInfoByName($name);

    abstract public function getSingleById($id);

    abstract public function getInfoById($id);

    abstract public function getList();
}
