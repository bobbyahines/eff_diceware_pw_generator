<?php
declare(strict_types=1);


namespace App;


final class Password
{
    protected SingleDie $singleDie;
    protected array $dictionary;

    public function __construct(SingleDie $singleDie, array $dictionary)
    {
        $this->singleDie = $singleDie;
        $this->dictionary = $dictionary;
    }

    protected function wordRoll(): string
    {
        $first = $this->singleDie->roll();
        $second = $this->singleDie->roll();
        $third = $this->singleDie->roll();
        $wordCode = $first . '-' . $second . '-' . $third;

        return $this->dictionary[$wordCode];
    }

    public function password(int $passwordLength = 6): string
    {
        $password = '';
        $iMax = $passwordLength + 1;
        for ($i = 0; $i < $iMax; ++$i) {
            $password .= $this->wordRoll() . ' ';
        }

        return rtrim($password);
    }
}