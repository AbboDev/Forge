<?php

namespace Forge\Models;

/**
 * CpuSocket
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:48
 */
class CpuSocket extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="socket", type="string", length=15, nullable=false)
     */
    protected $socket;

    /**
     *
     * @var string
     * @Column(column="alias", type="string", length=15, nullable=true)
     */
    protected $alias;

    /**
     *
     * @var integer
     * @Column(column="pin", type="integer", length=5, nullable=true)
     */
    protected $pin;

    /**
     *
     * @var integer
     * @Column(column="package", type="integer", length=5, nullable=false)
     */
    protected $package;

    /**
     * Method to set the value of field socket
     *
     * @param string $socket
     * @return $this
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * Method to set the value of field alias
     *
     * @param string $alias
     * @return $this
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Method to set the value of field pin
     *
     * @param integer $pin
     * @return $this
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Method to set the value of field package
     *
     * @param integer $package
     * @return $this
     */
    public function setPackage($package)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Returns the value of field socket
     *
     * @return string
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Returns the value of field alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Returns the value of field pin
     *
     * @return integer
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Returns the value of field package
     *
     * @return integer
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
        $this->setSource("cpu_socket");
        $this->hasMany('id', 'Forge\Models\CpuGeneration', 'socket', ['alias' => 'CpuGeneration']);
        $this->belongsTo('package', 'Forge\Models\CpuSocketPackage', 'id', ['alias' => 'CpuSocketPackage']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_socket';
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
            'socket' => 'socket',
            'alias' => 'alias',
            'pin' => 'pin',
            'package' => 'package'
        ];
    }
}
