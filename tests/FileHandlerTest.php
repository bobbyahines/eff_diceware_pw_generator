<?php
declare(strict_types=1);


namespace Tests;


use App\FileHandler;
use PHPUnit\Framework\TestCase;

class FileHandlerTest extends TestCase
{
    public function testAssetExistsAndReadable(): void
    {
        $file = dirname(__DIR__) . '/src/FileHandler.php';

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    public function testClassInstanitaion(): void
    {
        $type = 'startrek';
        $fh = new FileHandler($type);

        $this->assertInstanceOf(FileHandler::class, $fh);

        unset($fh);
    }

    public function testGetContentsMethod(): void
    {
        $types = ['startrek', 'starwars', 'harrypotter', 'got'];

        foreach ($types as $type) {
            $fh = new FileHandler($type);
            $contents = $fh->getContents();
            unset($fh);

            $this->assertIsArray($contents);
            $this->assertIsIterable($contents);
        }
    }
}
