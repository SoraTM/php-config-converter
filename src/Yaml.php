<?php

namespace Yaml;

use Symfony\Component\Yaml;

function yamlDecode($content)
{
    try {
        $value = Yaml\Yaml::parse($content);
    } catch (Exception\ParseException $e) {
        printf("Unable to parse the YAML string: %s", $e->getMessage());
    }
    
    //return $value;
}

function yamlEncode($arr)
{
    return trim(Yaml::dump($arr));
}
