<?php
declare(strict_types=1);

namespace App\DomainModel\Product;

use Exception;

/**
 * Class InvalidUnitPriceException
 * @package App\DomainModel\Product
 */
class InvalidUnitPriceException extends Exception
{
    private const EXCEPTION_RESPONSE = 'Invalid Unit Price';

    /**
     * @return InvalidUnitPriceException
     */
    public static function invalidUnitPrice(): InvalidUnitPriceException
    {
        return new self(self::EXCEPTION_RESPONSE);
    }
}
