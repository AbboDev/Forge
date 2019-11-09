<?php

namespace Forge\Models;

/**
 * Cpu
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:34
 */
class Cpu extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="part", type="string", length=30, nullable=true)
     */
    protected $part;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=40, nullable=false)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(column="architecture", type="integer", length=5, nullable=false)
     */
    protected $architecture;

    /**
     *
     * @var string
     * @Column(column="released_date", type="string", nullable=false)
     */
    protected $releasedDate;

    /**
     * Method to set the value of field part
     *
     * @param string $part
     * @return $this
     */
    public function setPart($part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field architecture
     *
     * @param integer $architecture
     * @return $this
     */
    public function setArchitecture($architecture)
    {
        $this->architecture = $architecture;

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
     * Returns the value of field part
     *
     * @return string
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field architecture
     *
     * @return integer
     */
    public function getArchitecture()
    {
        return $this->architecture;
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
        $this->setSource("cpu");
        $this->hasMany('id', 'Forge\Models\CpuMeta', 'cpu', ['alias' => 'CpuMeta']);
        $this->hasMany('id', 'Forge\Models\CpuPrice', 'cpu', ['alias' => 'CpuPrice']);
        $this->belongsTo('architecture', 'Forge\Models\CpuArchitecture', 'id', ['alias' => 'CpuArchitecture']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu';
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
            'part' => 'part',
            'name' => 'name',
            'architecture' => 'architecture',
            'released_date' => 'releasedDate'
        ];
    }
}
