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


abstract class PriceStateAbstract {
    abstract function getCharge($daysRented);

    public function getFrequentRenterPoints()
    {
        return 1;
    }
} 