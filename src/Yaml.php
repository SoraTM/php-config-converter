<?php

namespace Yaml;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

function yamlDecode($content)
{
    try {
        $value = Yaml::parse($content);
    } catch (ParseException $e) {
        throw new \Exception("Unable to parse the YAML string");
    }

    return $value;
}

function yamlEncode($arr)
{
    return trim(Yaml::dump($arr));
}
