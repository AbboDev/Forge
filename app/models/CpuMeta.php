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
     * @Column(column="l1_cache_core", type="integer", length=3, nullable=true)
     */
    protected $l1CacheCore;

    /**
     *
     * @var integer
     * @Column(column="l1_cache_shared", type="integer", length=3, nullable=true)
     */
    protected $l1CacheShared;

    /**
     *
     * @var integer
     * @Column(column="l2_cache_core", type="integer", length=5, nullable=true)
     */
    protected $l2CacheCore;

    /**
     *
     * @var integer
     * @Column(column="l2_cache_shared", type="integer", length=5, nullable=true)
     */
    protected $l2CacheShared;

    /**
     *
     * @var integer
     * @Column(column="l3_cache_core", type="integer", length=5, nullable=true)
     */
    protected $l3CacheCore;

    /**
     *
     * @var integer
     * @Column(column="l3_cache_shared", type="integer", length=5, nullable=true)
     */
    protected $l3CacheShared;

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
     * Method to set the value of field threads_shared
     *
     * @param integer $threadsShared
     * @return $this
     */
    public function setThreadsShared($threadsShared)
    {
        $this->threadsShared = $threadsShared;

        return $this;
    }

    /**
     * Method to set the value of field l1_cache_core
     *
     * @param integer $l1CacheCore
     * @return $this
     */
    public function setL1CacheCore($l1CacheCore)
    {
        $this->l1CacheCore = $l1CacheCore;

        return $this;
    }

    /**
     * Method to set the value of field l1_cache_shared
     *
     * @param integer $l1CacheShared
     * @return $this
     */
    public function setL1CacheShared($l1CacheShared)
    {
        $this->l1CacheShared = $l1CacheShared;

        return $this;
    }

    /**
     * Method to set the value of field l2_cache_core
     *
     * @param integer $l2CacheCore
     * @return $this
     */
    public function setL2CacheCore($l2CacheCore)
    {
        $this->l2CacheCore = $l2CacheCore;

        return $this;
    }

    /**
     * Method to set the value of field l2_cache_shared
     *
     * @param integer $l2CacheShared
     * @return $this
     */
    public function setL2CacheShared($l2CacheShared)
    {
        $this->l2CacheShared = $l2CacheShared;

        return $this;
    }

    /**
     * Method to set the value of field l3_cache_core
     *
     * @param integer $l3CacheCore
     * @return $this
     */
    public function setL3CacheCore($l3CacheCore)
    {
        $this->l3CacheCore = $l3CacheCore;

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
     * Returns the value of field l1CacheCore
     *
     * @return integer
     */
    public function getL1CacheCore()
    {
        return $this->l1CacheCore;
    }

    /**
     * Returns the value of field l1CacheShared
     *
     * @return integer
     */
    public function getL1CacheShared()
    {
        return $this->l1CacheShared;
    }

    /**
     * Returns the value of field l2CacheCore
     *
     * @return integer
     */
    public function getL2CacheCore()
    {
        return $this->l2CacheCore;
    }
    /**
     * Returns the value of field l2CacheShared
     *
     * @return integer
     */
    public function getL2CacheShared()
    {
        return $this->l2CacheShared;
    }

    /**
     * Returns the value of field l3CacheCore
     *
     * @return integer
     */
    public function getL3CacheCore()
    {
        return $this->l3CacheCore;
    }

    /**
     * Returns the value of field l3CacheShared
     *
     * @return integer
     */
    public function getL3CacheShared()
    {
        return $this->l3CacheShared;
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
            'l1_cache_core' => 'l1CacheCore',
            'l1_cache_shared' => 'l1CacheShared',
            'l2_cache_core' => 'l2CacheCore',
            'l2_cache_shared' => 'l2CacheShared',
            'l3_cache_core' => 'l3CacheCore',
            'l3_cache_shared' => 'l3CacheShared',
            'clock_speed' => 'clockSpeed',
            'turbo_clock_speed' => 'turboClockSpeed'
        ];
    }
}
