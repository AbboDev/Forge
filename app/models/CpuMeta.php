<?php

namespace Forge\Models;

/**
 * CpuMeta
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:43
 */
class CpuMeta extends IdentificableModel
{
    /**
     *
     * @var integer
     * @Column(column="cpu", type="integer", length=5, nullable=false)
     */
    protected $cpu;

    /**
     *
     * @var integer
     * @Column(column="cores", type="integer", length=3, nullable=true)
     */
    protected $cores;

    /**
     *
     * @var integer
     * @Column(column="threads", type="integer", length=3, nullable=true)
     */
    protected $threads;

    /**
     *
     * @var integer
     * @Column(column="l1_cache_data", type="integer", length=3, nullable=true)
     */
    protected $l1CacheData;

    /**
     *
     * @var integer
     * @Column(column="l1_cache_instruction", type="integer", length=3, nullable=true)
     */
    protected $l1CacheInstruction;

    /**
     *
     * @var integer
     * @Column(column="l2_cache", type="integer", length=5, nullable=true)
     */
    protected $l2Cache;

    /**
     *
     * @var integer
     * @Column(column="l3_cache", type="integer", length=5, nullable=true)
     */
    protected $l3Cache;

    /**
     *
     * @var integer
     * @Column(column="clock_speed", type="integer", length=4, nullable=true)
     */
    protected $clockSpeed;

    /**
     *
     * @var integer
     * @Column(column="turbo_clock_speed", type="integer", length=4, nullable=true)
     */
    protected $turboClockSpeed;

    /**
     * Method to set the value of field cpu
     *
     * @param integer $cpu
     * @return $this
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Method to set the value of field cores
     *
     * @param integer $cores
     * @return $this
     */
    public function setCores($cores)
    {
        $this->cores = $cores;

        return $this;
    }

    /**
     * Method to set the value of field threads
     *
     * @param integer $threads
     * @return $this
     */
    public function setThreads($threads)
    {
        $this->threads = $threads;

        return $this;
    }

    /**
     * Method to set the value of field l1_cache_data
     *
     * @param integer $l1CacheData
     * @return $this
     */
    public function setL1CacheData($l1CacheData)
    {
        $this->l1CacheData = $l1CacheData;

        return $this;
    }

    /**
     * Method to set the value of field l1_cache_instruction
     *
     * @param integer $l1CacheInstruction
     * @return $this
     */
    public function setL1CacheInstruction($l1CacheInstruction)
    {
        $this->l1CacheInstruction = $l1CacheInstruction;

        return $this;
    }

    /**
     * Method to set the value of field l2_cache
     *
     * @param integer $l2Cache
     * @return $this
     */
    public function setL2Cache($l2Cache)
    {
        $this->l2Cache = $l2Cache;

        return $this;
    }

    /**
     * Method to set the value of field l3_cache
     *
     * @param integer $l3Cache
     * @return $this
     */
    public function setL3Cache($l3Cache)
    {
        $this->l3Cache = $l3Cache;

        return $this;
    }

    /**
     * Method to set the value of field clock_speed
     *
     * @param integer $clockSpeed
     * @return $this
     */
    public function setClockSpeed($clockSpeed)
    {
        $this->clockSpeed = $clockSpeed;

        return $this;
    }

    /**
     * Method to set the value of field turbo_clock_speed
     *
     * @param integer $turboClockSpeed
     * @return $this
     */
    public function setTurboClockSpeed($turboClockSpeed)
    {
        $this->turboClockSpeed = $turboClockSpeed;

        return $this;
    }

    /**
     * Returns the value of field cpu
     *
     * @return integer
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Returns the value of field cores
     *
     * @return integer
     */
    public function getCores()
    {
        return $this->cores;
    }

    /**
     * Returns the value of field threads
     *
     * @return integer
     */
    public function getThreads()
    {
        return $this->threads;
    }

    /**
     * Returns the value of field l1CacheData
     *
     * @return integer
     */
    public function getL1CacheData()
    {
        return $this->l1CacheData;
    }

    /**
     * Returns the value of field l1CacheInstruction
     *
     * @return integer
     */
    public function getL1CacheInstruction()
    {
        return $this->l1CacheInstruction;
    }

    /**
     * Returns the value of field l2Cache
     *
     * @return integer
     */
    public function getL2Cache()
    {
        return $this->l2Cache;
    }

    /**
     * Returns the value of field l3Cache
     *
     * @return integer
     */
    public function getL3Cache()
    {
        return $this->l3Cache;
    }

    /**
     * Returns the value of field clockSpeed
     *
     * @return integer
     */
    public function getClockSpeed()
    {
        return $this->clockSpeed;
    }

    /**
     * Returns the value of field turboClockSpeed
     *
     * @return integer
     */
    public function getTurboClockSpeed()
    {
        return $this->turboClockSpeed;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_meta");
        $this->belongsTo('cpu', 'Forge\Models\Cpu', 'id', ['alias' => 'Cpu']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_meta';
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
            'cpu' => 'cpu',
            'cores' => 'cores',
            'threads' => 'threads',
            'l1_cache_data' => 'l1CacheData',
            'l1_cache_instruction' => 'l1CacheInstruction',
            'l2_cache' => 'l2Cache',
            'l3_cache' => 'l3Cache',
            'clock_speed' => 'clockSpeed',
            'turbo_clock_speed' => 'turboClockSpeed'
        ];
    }
}
