<?php

namespace Forge\Controllers;

// https://forum.phalcon.io/discussion/22/the-best-way-for-json-response-

abstract class ApiController extends \Phalcon\Mvc\Controller
{
    abstract public function getSingleByName($name, $format);

    abstract public function getInfoByName($name, $format);

    abstract public function getSingleById($id, $format);

    abstract public function getInfoById($id, $format);

    abstract public function getList($format);
}
