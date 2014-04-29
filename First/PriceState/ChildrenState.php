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

use First\PriceStateInterface;


/**
 * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
 */
class ChildrenState extends PriceStateAbstract
{
    public function getCharge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
        }

        return $result;
    }
} 