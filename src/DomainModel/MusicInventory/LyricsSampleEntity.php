<?php
declare(strict_types=1);

namespace App\DomainModel\MusicInventory;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class LyricsSampleEntity
 * @package App\DomainModel\MusicInventory
 * @ORM\Entity()
 * @ORM\Table(name="lyrics_sample")
 */
class LyricsSampleEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lyrics_sample_seq", initialValue=1)
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="TrackEntity", inversedBy="lyricsSampleCollection")
     * @ORM\JoinColumn(name="track_id", referencedColumnName="id")
     */
    private $trackId;
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $sample;

    /**
     * LyricsSampleEntity constructor.
     * @param TrackEntity $trackId
     */
    public function __construct(TrackEntity $trackId)
    {
        $this->trackId = $trackId;
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
    public function getSample(): string
    {
        return $this->sample;
    }

    /**
     * @param string $sample
     * @return $this
     */
    public function setSample(string $sample): self
    {
        $this->sample = $sample;
        return $this;
    }
}
