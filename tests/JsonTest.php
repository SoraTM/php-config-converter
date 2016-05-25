<?php

namespace Json\Tests;

use function Json\jsonToArr;
use function Json\arrToJson;

class JsonTest extends \PHPUnit_Framework_TestCase
{

    public function testJson()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.json');

        $arr = [ "name" => "soratm/php-config-converter",
        "description" => "Tools for converting config files one to another (xml, yml, json)",
        "license" => "MIT",
        "authors" => [
            [ "name" => "Timur Malikin",
            "email" => "timur.malikin@gmail.com",
            "role" => "Developer" ]
        ]];

        $this->assertEquals($arr, jsonToArr($file));
        $this->assertEquals($file, arrToJson($arr));
    }
}
