<?php

namespace Forge\Models;

/**
 * CpuCodename
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:37
 */
class CpuCodename extends IdentificableModel
{
    /**
     *
     * @var string
     * @Column(column="codename", type="string", length=30, nullable=false)
     */
    protected $codename;

    /**
     * Method to set the value of field codename
     *
     * @param string $codename
     * @return $this
     */
    public function setCodename($codename)
    {
        $this->codename = $codename;

        return $this;
    }

    /**
     * Returns the value of field codename
     *
     * @return string
     */
    public function getCodename()
    {
        return $this->codename;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_codename");
        $this->hasMany('id', 'Forge\Models\CpuGeneration', 'codename', ['alias' => 'CpuGeneration']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_codename';
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
            'codename' => 'codename'
        ];
    }
}
