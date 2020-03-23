<?php
declare(strict_types=1);

namespace App\DomainModel\MusicInventory;

/**
 * Class MusicInventoryService
 * @package App\DomainModel\MusicInventory
 */
class MusicInventoryService
{
    private $repository;

    /**
     * MusicInventoryService constructor.
     * @param MusicInventoryRepository $repository
     */
    public function __construct(MusicInventoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
