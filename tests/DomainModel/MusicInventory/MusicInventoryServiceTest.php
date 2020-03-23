<?php
declare(strict_types=1);

namespace App\Tests\DomainModel\MusicInventory;

use App\DomainModel\MusicInventory\MusicInventoryService;
use App\Infrastructure\MusicInventory\MusicInventoryRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class MusicInventoryServiceTest
 * @package App\Tests\DomainModel\MusicInventory
 */
class MusicInventoryServiceTest extends TestCase
{
    protected $musicInventoryService;

    /**
     * @return array
     */
    public function phrasesMatchToTrackTitleProvider(): array
    {
        return [
            ['chciałbym być tatuażem jakoś tak', 'Chciałem być'],
            ['to był maj', 'Małgośka'],
            ['coś tam ribok najk', ''],
            ['reebok on the night', 'Rhythm of the Night']
        ];
    }

    /**
     * @dataProvider phrasesMatchToTrackTitleProvider
     * @string $input
     * @string $result
     */
    public function testGetTrackTitleByPhrases($input, $result): void
    {
        $this->assertEquals($result, $this->musicInventoryService->getTrackTitleByPhrases($input));
    }

    public function setUp()
    {
        $repository = $this->getMockBuilder(MusicInventoryRepository::class)
            ->disableOriginalConstructor()->getMock();
        $this->musicInventoryService = new MusicInventoryService($repository);
    }
}
