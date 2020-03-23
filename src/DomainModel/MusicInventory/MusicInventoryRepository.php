<?php
declare(strict_types=1);

namespace App\DomainModel\MusicInventory;

/**
 * Interface MusicInventoryRepository
 * @package App\DomainModel\MusicInventory
 */
interface MusicInventoryRepository
{
    /**
     * @param string $sample
     * @return TrackEntity
     */
    public function findTrackBySample(string $sample): TrackEntity;

    /**
     * @param string $title
     * @return PerformerEntity
     */
    public function findPerformerByTrackTitle(string $title): PerformerEntity;
}
