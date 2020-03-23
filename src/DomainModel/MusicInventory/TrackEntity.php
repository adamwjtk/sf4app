<?php
declare(strict_types=1);

namespace App\DomainModel\MusicInventory;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TrackEntity
 * @package App\DomainModel\MusicInventory
 * @ORM\Entity()
 * @ORM\Table(name="track")
 */
class TrackEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="track_seq")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="PerformerEntity", inversedBy="trackCollection")
     * @ORM\JoinColumn(name="performer_id", referencedColumnName="id")
     */
    private $performerId;
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $title;
    /**
     * @ORM\OneToMany(targetEntity="LyricsSampleEntity", mappedBy="trackId", cascade={"persist"})
     * @var Collection
     */
    private $lyricsSample;

    /**
     * TrackEntity constructor.
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
        $this->lyricsSample = new ArrayCollection();
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
    public function getPerformerId(): int
    {
        return $this->performerId;
    }

    /**
     * @param PerformerEntity $performerId
     * @return $this
     */
    public function setPerformerId(PerformerEntity $performerId): self
    {
        $this->performerId = $performerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
