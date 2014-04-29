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
class Rental 
{
    private $_movie;
    private $_daysRented;

    public function __construct(Movie $movie, $daysRented)
    {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->_daysRented;
    }

    public function getMovie()
    {
        return $this->_movie;
    }

    public function getCharge()
    {
        return $this->_movie->getCharge($this->getDaysRented());
    }

    /**
     * @param $frequentRenterPoints
     * @param $this
     * @return mixed
     */
    public function getFrequentRenterPoints()
    {
        return $this->_movie->getFrequentRenterPoints($this->getDaysRented());
    }
}