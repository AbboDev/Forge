<?php

namespace Forge\Models;

/**
 * CpuCodename
 *
 * @package Forge\Models
 * @autogenerated by Phalcon Developer Tools
 * @date 2019-10-20, 21:08:36
 */
class CpuCodename extends \Phalcon\Mvc\Model
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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
        $this->setSource("cpu_codename");
        $this->hasMany('id', 'Forge\Models\CpuModel', 'codename', ['alias' => 'CpuModel']);
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
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpuCodename[]|CpuCodename|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CpuCodename|\Phalcon\Mvc\Model\ResultInterface
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
            'codename' => 'codename'
        ];
    }
}
