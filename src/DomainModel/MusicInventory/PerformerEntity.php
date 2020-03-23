<?php
declare(strict_types=1);

namespace App\DomainModel\MusicInventory;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class PerformerEntity
 * @package App\DomainModel\MusicInventory
 * @ORM\Entity()
 * @ORM\Table(name="performer")
 */
class PerformerEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="performer_seq", initialValue=1)
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="TrackEntity", mappedBy="performerId", cascade={"persist"})
     * @var Collection
     */
    private $track;

    public function __construct()
    {
        $this->track = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return PerformerEntity
     */
    public function setName(string $name): PerformerEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTrack(): Collection
    {
        return $this->track;
    }

    /**
     * @param Collection $track
     * @return PerformerEntity
     */
    public function setTrack(Collection $track): PerformerEntity
    {
        $this->track = $track;
        return $this;
    }
}
