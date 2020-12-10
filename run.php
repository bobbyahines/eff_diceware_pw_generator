<?php
declare(strict_types=1);


require_once __DIR__ . '/vendor/autoload.php';


$name = $argv[1] ?: 'startrek';

$fh = new \App\FileHandler($name);
$dictionary = $fh->getContents();
unset($fh);

$die = new \App\SingleDie(20);

$password = new \App\Password($die, $dictionary);
$newPassword = $password->password(5);
unset($password);

echo $newPassword . PHP_EOL;
