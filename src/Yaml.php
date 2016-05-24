<?php

namespace Yaml;

use Symfony\Component\Yaml\Yaml;

function yamlToArr($content)
{
    return Yaml::parse($content);
}

function arrToYaml($arr)
{
    return Yaml::dump($arr);
}
