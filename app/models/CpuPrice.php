<?php

namespace Forge\Models;

/**
 * CpuPrice
 *
 * @package Forge\Models
 * @date 2019-11-09, 14:55:45
 */
class CpuPrice extends IdentificableModel
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=8, nullable=false)
     */
    protected $id;

    /**
     *
     * @var integer
     * @Column(column="cpu", type="integer", length=5, nullable=false)
     */
    protected $cpu;

    /**
     *
     * @var double
     * @Column(column="price", type="double", length=4, nullable=false)
     */
    protected $price;

    /**
     *
     * @var string
     * @Column(column="seller", type="string", length=30, nullable=false)
     */
    protected $seller;

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
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field seller
     *
     * @param string $seller
     * @return $this
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;

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
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field seller
     *
     * @return string
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setSource("cpu_price");
        $this->belongsTo('cpu', 'Forge\Models\Cpu', 'id', ['alias' => 'Cpu']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cpu_price';
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
            'price' => 'price',
            'seller' => 'seller'
        ];
    }
}
