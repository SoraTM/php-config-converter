<?php

namespace Yaml\Tests;

use function Yaml\yamlToArr;
use function Yaml\arrToYaml;

class YamlTest extends \PHPUnit_Framework_TestCase
{

    public function testJson()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.yml');

        $arr = [ "name" => "soratm/php-config-converter",
        "description" => "Tools for converting config files one to another (xml, yml, json)",
        "license" => "MIT",
        "authors" => [
            [ "name" => "Timur Malikin",
            "email" => "timur.malikin@gmail.com",
            "role" => "Developer" ]
        ]];

        $this->assertEquals($arr, yamlToArr($file));
        $this->assertEquals($file, arrToYaml($arr));
    }
}
