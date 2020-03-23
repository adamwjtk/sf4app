<?php
declare(strict_types=1);

namespace App\Tests\DomainModel\Product;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\DomainModel\Product\ProductEntity;

/**
 * Class ProductEntityTest
 * @package App\Tests\DomainModel\Product
 */
class ProductEntityTest extends TestCase
{
    /**
     * @test
     * @expectedException \App\DomainModel\Product\InvalidUnitPriceException
     */
    public function itThrowsExceptionForInvalidUnitPrice(): void
    {
        $product = new ProductEntity();
        $product->setUnitPrice(0);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function itThrowsExceptionForInvalidMinimumQuantity(): void
    {
        $product = new ProductEntity();
        $product->setMinimumQuantity(0);
    }
}
