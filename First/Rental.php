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

    /**
     * @param Rental $rental
     * @param $thisAmount
     * @return float|int
     */
    public function getCharge()
    {
        $result = 0;

        switch ($this->getMovie()->getPriceCode()) {
            case Movie::$REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2) {
                    $result += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::$NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::$CHILDREN:
                $result += 1.5;
                if ($this->getDaysRented() > 3) {
                    $result += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }

        return $result;
    }

    /**
     * @param $frequentRenterPoints
     * @param $this
     * @return mixed
     */
    public function getFrequentRenterPoints()
    {
        if (($this->getMovie()->getPriceCode() == Movie::$NEW_RELEASE) && $this->getDaysRented() > 1) {
            return 2;
        } else {
            return 1;
        }
    }
}