<?php

namespace Forge\Models;

/**
 * CpuSeries
 *
 * @package Forge\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2019-10-20, 21:08:36
 */
class CpuSeries extends \Phalcon\Mvc\Model
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
     * @Column(column="series", type="string", length=30, nullable=true)
     */
    protected $series;

    /**
     * Method to set the value of field series
     *
     * @param string $series
     * @return $this
     */
    public function setSeries($series)
    {
        $this->series = $series;

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
     * Returns the value of field series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("cpu_series");
        $this->hasMany('id', 'Forge\Models\CpuModel', 'generation', ['alias' => 'CpuModel']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_series';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpuSeries[]|CpuSeries|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpuSeries|\Phalcon\Mvc\Model\ResultInterface
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
            'series' => 'series'
        ];
    }
}