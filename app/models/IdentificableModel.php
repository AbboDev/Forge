<?php

namespace Forge\Models;

/**
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:52
 */
class IdentificableModel extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("forge_test");
    }
}
