<?php
/**
 * This file is part of ONP.
 *
 * Copyright (c) 2014 Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace First;

use First\PriceState\ChildrenState;
use First\PriceState\NewReleaseState;
use First\PriceState\RegularState;

/**
 * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
 */
class Movie 
{
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDREN = 2;

    private $_title;
    private $_priceCode;

    /**
     * @var PriceStateAbstract
     */
    private $_pricePolicy;

    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getPriceCode()
    {
        return $this->_priceCode;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setPriceCode($arg)
    {
        switch($arg) {
            case self::REGULAR:
                $this->_pricePolicy = new RegularState();
                break;
            case self::NEW_RELEASE:
                $this->_pricePolicy = new NewReleaseState();
                break;
            case self::CHILDREN:
                $this->_pricePolicy = new ChildrenState();
                break;
            default:
                throw new \Exception('Wrong price code');
        }

        $this->_priceCode = $arg;
    }

    /**
     * @param Rental $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        return $this->_pricePolicy->getCharge($daysRented);
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return $this->_pricePolicy->getFrequentRenterPoints($daysRented);
    }

} 