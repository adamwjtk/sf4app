<?php
declare(strict_types=1);

namespace App\Infrastructure\MusicInventory;

use App\DomainModel\MusicInventory\PerformerEntity;
use App\DomainModel\MusicInventory\TrackEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use App\DomainModel\MusicInventory as Domain;

/**
 * Class MusicInventoryRepository
 * @package App\Infrastructure\MusicInventory
 */
class MusicInventoryRepository implements Domain\MusicInventoryRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var EntityRepository
     */
    private $repository;

    /**
     * DictionaryDbRepository constructor.
     * @param EntityManagerInterface $repository
     */
    public function __construct(EntityManagerInterface $repository)
    {
        $this->em = $repository;
        $this->repository = $repository->getRepository(PerformerEntity::class);
    }

    /**
     * @param string $sample
     * @return TrackEntity
     */
    public function findTrackBySample(string $sample): TrackEntity
    {
        // TODO: Implement findTrackBySample() method.
    }

    /**
     * @param string $title
     * @return PerformerEntity
     */
    public function findPerformerByTrackTitle(string $title): PerformerEntity
    {
        // TODO: Implement findPerformerByTrackTitle() method.
    }
}
