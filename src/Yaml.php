<?php

namespace Yaml;

use Symfony\Component\Yaml\Yaml;

function yamlDecode($content)
{
    return Yaml::parse($content);
}

function yamlEncode($arr)
{
    return trim(Yaml::dump($arr));
}
