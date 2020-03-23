<?php


namespace DataFixtures;

use App\DomainModel\MusicInventory\LyricsSampleEntity;
use App\DomainModel\MusicInventory\PerformerEntity;
use App\DomainModel\MusicInventory\TrackEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class MusicInventoryFixtures
 * @package App\DataFixtures
 */
class MusicInventoryFixtures extends Fixture
{
    private const ARTISTS = ['Krzysztof Krawczyk', 'Maryla Rodowicz', 'Corona'];
    private const TRACKS = ['Corona' => [
        'Rhythm of the Night'
    ],
        'Maryla Rodowicz' => [
            'Małgośka'
        ],
        'Krzysztof Krawczyk' => [
            'Chciałem być'
        ]
    ];
    private const SAMPLE = [
        'Rhythm of the Night' => [
            'Ribok or de najk', 'reebok', 'nike', 'coś tam night', 'ooouu yee'
        ],
        'Małgośka' => ['Saska kempa', 'saska kępa', 'to był maj'],
        'Chciałem być' => ['Marynarzem', 'być tatuażem', 'tatuarzem']
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::ARTISTS as $artist) {
            $performerEntity = new PerformerEntity();
            $performerEntity->setName($artist);
            foreach (self::TRACKS[$artist] as $track) {
                $trackEntity = new TrackEntity($track);
                $trackEntity->setPerformerId($performerEntity);
                $manager->persist($trackEntity);
                foreach (self::SAMPLE[$track] as $sample) {
                    $lyricsSampleEntity = new LyricsSampleEntity($trackEntity);
                    $lyricsSampleEntity->setSample($sample);
                    $manager->persist($lyricsSampleEntity);
                }
            }
            $manager->persist($performerEntity);
        }
        $manager->flush();
    }
}
