<?php

namespace Converter\Codecs\Yaml;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

function decode($content)
{
    return Yaml::parse($content);
}

function encode($arr)
{
    return trim(Yaml::dump($arr));
}

function getSupportedFormat()
{
    return 'yml';
}
