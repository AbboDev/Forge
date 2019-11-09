<?php

namespace Forge\Models;

/**
 * CpuFamily
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:39
 */
class CpuFamily extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="family", type="string", length=30, nullable=false)
     */
    protected $family;

    /**
     *
     * @var integer
     * @Column(column="generation", type="integer", length=5, nullable=false)
     */
    protected $generation;

    /**
     * Method to set the value of field family
     *
     * @param string $family
     * @return $this
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Method to set the value of field generation
     *
     * @param integer $generation
     * @return $this
     */
    public function setGeneration($generation)
    {
        $this->generation = $generation;

        return $this;
    }

    /**
     * Returns the value of field family
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Returns the value of field generation
     *
     * @return integer
     */
    public function getGeneration()
    {
        return $this->generation;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_family");
        $this->hasMany('id', 'Forge\Models\CpuArchitecture', 'family', ['alias' => 'CpuArchitecture']);
        $this->belongsTo('generation', 'Forge\Models\CpuGeneration', 'id', ['alias' => 'CpuGeneration']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_family';
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
            'family' => 'family',
            'generation' => 'generation'
        ];
    }
}
