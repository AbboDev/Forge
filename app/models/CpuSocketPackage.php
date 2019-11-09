<?php

namespace Forge\Models;

/**
 * CpuSocketPackage
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:49
 */
class CpuSocketPackage extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="package", type="string", length=30, nullable=false)
     */
    protected $package;

    /**
     * Method to set the value of field package
     *
     * @param string $package
     * @return $this
     */
    public function setPackage($package)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Returns the value of field package
     *
     * @return string
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_socket_package");
        $this->hasMany('id', 'Forge\Models\CpuSocket', 'package', ['alias' => 'CpuSocket']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_socket_package';
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
            'package' => 'package'
        ];
    }
}
