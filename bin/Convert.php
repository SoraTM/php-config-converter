<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use function Converter\startConvert;

startConvert($argv[1], $argv[2]);
