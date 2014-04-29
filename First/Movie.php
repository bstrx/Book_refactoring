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


/**
 * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
 */
class Movie 
{
    public static $CHILDREN = 2;
    public static $REGULAR = 0;
    public static $NEW_RELEASE = 1;

    private $_title;
    private $_priceCode;

    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    public function getPriceCode()
    {
        return $this->_priceCode;
    }

    public function setPriceCode($arg)
    {
        $this->_priceCode = $arg;
    }

    public function getTitle()
    {
        return $this->_title;
    }
} 