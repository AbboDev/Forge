<?php

namespace Forge\Models;

/**
 * CpuGeneration
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:41
 */
class CpuGeneration extends IdentificableModel
{
    /**
     *
     * @var integer
     * @Column(column="codename", type="integer", length=3, nullable=false)
     */
    protected $codename;

    /**
     *
     * @var integer
     * @Column(column="series", type="integer", length=3, nullable=false)
     */
    protected $series;

    /**
     *
     * @var integer
     * @Column(column="socket", type="integer", length=3, nullable=false)
     */
    protected $socket;

    /**
     * Method to set the value of field codename
     *
     * @param integer $codename
     * @return $this
     */
    public function setCodename($codename)
    {
        $this->codename = $codename;

        return $this;
    }

    /**
     * Method to set the value of field series
     *
     * @param integer $series
     * @return $this
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Method to set the value of field socket
     *
     * @param integer $socket
     * @return $this
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * Returns the value of field codename
     *
     * @return integer
     */
    public function getCodename()
    {
        return $this->codename;
    }

    /**
     * Returns the value of field series
     *
     * @return integer
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Returns the value of field socket
     *
     * @return integer
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_generation");
        $this->hasMany('id', 'Forge\Models\CpuFamily', 'generation', ['alias' => 'CpuFamily']);
        $this->belongsTo('codename', 'Forge\Models\CpuCodename', 'id', ['alias' => 'CpuCodename']);
        $this->belongsTo('series', 'Forge\Models\CpuSeries', 'id', ['alias' => 'CpuSeries']);
        $this->belongsTo('socket', 'Forge\Models\CpuSocket', 'id', ['alias' => 'CpuSocket']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_generation';
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
            'codename' => 'codename',
            'series' => 'series',
            'socket' => 'socket'
        ];
    }
}
