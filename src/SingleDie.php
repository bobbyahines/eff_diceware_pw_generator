<?php
declare(strict_types=1);


namespace App;


final class SingleDie
{
    protected int $sides;

    /**
     * SingleDie constructor.
     * @param int $sides
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides >= 1 ? $sides : 6;
    }

    /**
     * @param int $numberOfRolls
     * @return int
     * @throws \Exception
     */
    public function roll(): int
    {
        return random_int(1, $this->sides);
    }
}