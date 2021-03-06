<?php

namespace Forge\Models;

/**
 * Manufacturer
 *
 * @package Forge\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2019-10-20, 21:08:36
 */
class Manufacturer extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=3, nullable=false)
     */
    protected $id;

    /**
     *
     * @var string
     * @Column(column="manufacturer", type="string", length=30, nullable=false)
     */
    protected $manufacturer;

    /**
     * Method to set the value of field manufacturer
     *
     * @param string $manufacturer
     * @return $this
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

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
     * Returns the value of field manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("manufacturer");
        $this->hasMany('id', 'Forge\Models\CpuModel', 'manufacturer', ['alias' => 'CpuModel']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'manufacturer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Manufacturer[]|Manufacturer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Manufacturer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'manufacturer' => 'manufacturer'
        ];
    }
}
