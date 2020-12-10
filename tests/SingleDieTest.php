<?php
declare(strict_types=1);


namespace Tests;


use App\SingleDie;
use PHPUnit\Framework\TestCase;

class SingleDieTest extends TestCase
{
    public function testAssetExistsAndReadable(): void
    {
        $file = dirname(__DIR__) . '/src/SingleDie.php';

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    public function testClassInstanitaion(): void
    {
        $sides = 10;
        $sd = new SingleDie($sides);
        $this->assertInstanceOf(SingleDie::class, $sd);
        unset($sd);
    }

    public function testMethod(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $sides = 10;
            $sd = new SingleDie($sides);
            $roll = $sd->roll();
            unset($sd);

            $this->assertLessThanOrEqual($sides, $roll);
        }
    }
}
