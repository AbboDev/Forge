<?php

namespace Forge\Models;

/**
 * Manufacturer
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:50
 */
class Manufacturer extends IdentificableModel
{
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
        parent::initialize();
        $this->setSource("manufacturer");
        $this->hasMany('id', 'Forge\Models\CpuArchitecture', 'manufacturer', ['alias' => 'CpuArchitecture']);
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
