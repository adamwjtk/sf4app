<?php

declare(strict_types=1);

namespace App\DomainModel\Product;

use InvalidArgumentException;

/**
 * Class ProductEntity
 * @package App\DomainModel\Product
 */
class ProductEntity
{
    private const MINIMUM_QUANTITY = 1;
    private const MINIMUM_QUANTITY_EXCEPTION = 'minimum quantity may not be less than ' . self::MINIMUM_QUANTITY;
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $unitPrice;
    /**
     * @var int
     */
    private $minimumQuantity = self::MINIMUM_QUANTITY;
    /**
     * @var string
     */
    private $name;

    /**
     * @param int $id
     * @return ProductEntity
     */
    public function setId(int $id): ProductEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @param int $unitPrice
     * @return ProductEntity
     * @throws InvalidUnitPriceException
     */
    public function setUnitPrice(int $unitPrice): ProductEntity
    {
        if (0 < $unitPrice) {
            $this->unitPrice = $unitPrice;
        } else {
            throw InvalidUnitPriceException::invalidUnitPrice();
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumQuantity(): int
    {
        return $this->minimumQuantity;
    }

    /**
     * @param int $minimumQuantity
     * @return ProductEntity
     */
    public function setMinimumQuantity(int $minimumQuantity): ProductEntity
    {
        if (0 < $minimumQuantity) {
            $this->minimumQuantity = $minimumQuantity;
        } else {
            throw new InvalidArgumentException(self::MINIMUM_QUANTITY_EXCEPTION);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductEntity
     */
    public function setName(string $name): ProductEntity
    {
        $this->name = $name;
        return $this;
    }
}
