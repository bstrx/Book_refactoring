<?php
/**
 * This file is part of ONP.
 *
 * Copyright (c) 2014 Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace First\PriceState;

use First\PriceStateAbstract;


/**
 * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
 */
class NewReleaseState extends PriceStateAbstract
{
    public function getCharge($daysRented)
    {
        $result = $daysRented * 3;

        return $result;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        } else {
            return parent::getFrequentRenterPoints($daysRented);
        }
    }
}