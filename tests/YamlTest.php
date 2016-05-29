<?php

namespace Yaml\Tests;

use function Yaml\yamlDecode;
use function Yaml\yamlEncode;

class YamlTest extends \PHPUnit_Framework_TestCase
{

    public function testYaml()
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

        $this->assertEquals($arr, yamlDecode($file));
        $this->assertEquals($file, yamlEncode($arr));
    }
}
