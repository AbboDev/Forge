<?php

namespace Forge\Models;

/**
 * CpuSeries
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:46
 */
class CpuSeries extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="series", type="string", length=30, nullable=false)
     */
    protected $series;

    /**
     *
     * @var string
     * @Column(column="released_date", type="string", nullable=true)
     */
    protected $releasedDate;

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
     * Method to set the value of field released_date
     *
     * @param string $releasedDate
     * @return $this
     */
    public function setReleasedDate($releasedDate)
    {
        $this->releasedDate = $releasedDate;

        return $this;
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
     * Returns the value of field releasedDate
     *
     * @return string
     */
    public function getReleasedDate()
    {
        return $this->releasedDate;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_series");
        $this->hasMany('id', 'Forge\Models\CpuGeneration', 'series', ['alias' => 'CpuGeneration']);
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
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id' => 'id',
            'series' => 'series',
            'released_date' => 'releasedDate'
        ];
    }
}
