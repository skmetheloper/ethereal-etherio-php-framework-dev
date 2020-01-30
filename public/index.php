<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Ethereal\Foundation\Application(
    dirname(__DIR__)
);

echo '<pre>', PHP_EOL;
var_dump($app);
echo PHP_EOL, '</pre>';
