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
class Customer 
{
    private $_name;
    private $_rentals;

    public function __construct($name)
    {
        $this->_rentals = new \ArrayObject();
        $this->_name = $name;
    }

    public function addRental($arg)
    {
        $this->_rentals->append($arg);
    }

    public function getName()
    {
        return $this->_name;
    }

    public function statement()
    {
        $rentals = $this->_rentals->getArrayCopy();
        $result = 'Учёт аренды для ' . $this->getName() . '\n';

        /** @var Rental $rental */
        foreach ($rentals as $rental) {
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
        }

        $result .= "Сумма задолженности составляет " . $this->getTotalCharge() . "\n";
        $result .= "Вы заработали " . $this->getTotalFrequentRenterPoints() . " очков за активность";

        return $result;
    }

    public function getTotalCharge()
    {
        $result = 0;

        /** @var Rental $rental */
        foreach ($this->_rentals as $rental) {
            $result = $rental->getCharge();
        }

        return $result;
    }

    public function getTotalFrequentRenterPoints()
    {
        $result = 0;

        /** @var Rental $rental */
        foreach ($this->_rentals as $rental) {
            $result = $rental->getFrequentRenterPoints();
        }

        return $result;
    }

}