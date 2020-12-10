<?php
declare(strict_types=1);


namespace App;


final class FileHandler
{
    protected array $source;

    protected const STARTREK_NAME = 'startrek';
    protected const STARTREK_URL = 'https://www.eff.org/files/2018/08/29/memory-alpha_8k_2018.txt';
    protected const STARWARS_NAME = 'starwars';
    protected const STARWARS_URL = 'https://www.eff.org/files/2018/08/29/starwars_8k_2018.txt';
    protected const HARRYPOT_NAME = 'harrypotter';
    protected const HARRYPOT_URL = 'https://www.eff.org/files/2018/08/29/harrypotter_8k_3column-txt.txt';
    protected const GOT_NAME = 'got';
    protected const GOT_URL = 'https://www.eff.org/files/2018/08/29/gameofthrones_8k-2018.txt';

    public function __construct(string $name = 'startrek')
    {
        $this->source = $this->source($name);
    }

    protected function source(string $name = 'startrek'): array
    {
        $sources =  [
          [
            'name' => self::STARTREK_NAME,
            'url' => self::STARTREK_URL,
          ],
          [
            'name' => self::STARWARS_NAME,
            'url' => self::STARWARS_URL,
          ],
          [
            'name' => self::HARRYPOT_NAME,
            'url' => self::HARRYPOT_URL,
          ],
          [
            'name' => self::GOT_NAME,
            'url' => self::GOT_URL,
          ],
        ];

        $sourceIndex = array_search($name, array_column($sources, 'name'), true);

        return $sources[$sourceIndex];
    }

    public function getContents(): array
    {
        $rawContents = file_get_contents($this->source['url']);
        $regex = '/(\d{1,2}-\d{1,2}-\d{1,2})(?:\s+)([a-z]+-*[a-z]+)/';
        preg_match_all($regex, $rawContents, $matches);

        return array_combine($matches[1], $matches[2]);
    }
}