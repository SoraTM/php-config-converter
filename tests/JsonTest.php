<?php

namespace Converter\Codecs\Json\Tests;

use function Converter\Codecs\Json\decode;
use function Converter\Codecs\Json\encode;
use function Converter\Codecs\Json\getSupportedFormat;

class JsonTest extends \PHPUnit_Framework_TestCase
{

    public function testJson()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.json');

        $arr = [
            "name" => "soratm/php-config-converter",
            "description" => "Tools for converting config files one to another (xml, yml, json)",
            "license" => "MIT",
            "authors" => [
                [
                    "name" => "Timur Malikin",
                    "email" => "timur.malikin@gmail.com",
                    "role" => "Developer"
                ]
            ]
        ];

        $this->assertEquals($arr, decode($file));
        $this->assertEquals($file, encode($arr));
        $this->assertEquals('json', getSupportedFormat());
    }

    /**
     * @expectedException Exception
     */
    public function testException()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.yml');
        decode($file);
    }
}
