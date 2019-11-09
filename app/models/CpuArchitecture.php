<?php

namespace Forge\Models;

/**
 * CpuArchitecture
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:35
 */
class CpuArchitecture extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="architecture", type="string", length=30, nullable=false)
     */
    protected $architecture;

    /**
     *
     * @var integer
     * @Column(column="manufacturer", type="integer", length=3, nullable=false)
     */
    protected $manufacturer;

    /**
     *
     * @var integer
     * @Column(column="family", type="integer", length=5, nullable=false)
     */
    protected $family;

    /**
     * Method to set the value of field architecture
     *
     * @param string $architecture
     * @return $this
     */
    public function setArchitecture($architecture)
    {
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * Method to set the value of field manufacturer
     *
     * @param integer $manufacturer
     * @return $this
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Method to set the value of field family
     *
     * @param integer $family
     * @return $this
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Returns the value of field architecture
     *
     * @return string
     */
    public function getArchitecture()
    {
        return $this->architecture;
    }

    /**
     * Returns the value of field manufacturer
     *
     * @return integer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Returns the value of field family
     *
     * @return integer
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_architecture");
        $this->hasMany('id', 'Forge\Models\Cpu', 'architecture', ['alias' => 'Cpu']);
        $this->belongsTo('family', 'Forge\Models\CpuFamily', 'id', ['alias' => 'CpuFamily']);
        $this->belongsTo('manufacturer', 'Forge\Models\Manufacturer', 'id', ['alias' => 'Manufacturer']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_architecture';
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
            'architecture' => 'architecture',
            'manufacturer' => 'manufacturer',
            'family' => 'family'
        ];
    }
}
