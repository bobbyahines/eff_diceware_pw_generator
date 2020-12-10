<?php
declare(strict_types=1);


namespace Tests;


use App\FileHandler;
use App\Password;
use App\SingleDie;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testAssetExistsAndReadable(): void
    {
        $file = dirname(__DIR__) . '/src/Password.php';

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    public function testClassInstantiation(): void
    {
        $fh = new FileHandler('startrek');
        $dictionary = $fh->getContents();
        unset ($fh);

        $sd = new SingleDie(6);
        $pw = new Password($sd, $dictionary);
        $this->assertInstanceOf(Password::class, $pw);
        unset($sd, $pw);
    }

    public function testPasswordMethod(): void
    {
        $fh = new FileHandler('startrek');
        $dictionary = $fh->getContents();
        unset ($fh);

        $sd = new SingleDie(6);
        $pw = new Password($sd, $dictionary);
        $numberOfWordsInPassword = 6;
        $newPassword = $pw->password($numberOfWordsInPassword);
        unset($sd, $pw);

        $resultArray = explode(' ', $newPassword);

        $this->assertIsString($newPassword);
        $this->assertCount(7, $resultArray);
    }
}
