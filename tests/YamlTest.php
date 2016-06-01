<?php

namespace Yaml\Tests;

use function Yaml\decode;
use function Yaml\encode;

class YamlTest extends \PHPUnit_Framework_TestCase
{

    public function testYaml()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.yml');

        $arr = [ 'name' => 'soratm/php-config-converter',
        'description' => 'Tools for converting config files one to another (xml, yml, json)',
        'license' => 'MIT',
        'authors' => [
            [ 'name' => 'Timur Malikin',
            'email' => 'timur.malikin@gmail.com',
            'role' => 'Developer' ]
        ]];

        $this->assertEquals($arr, decode($file));
        $this->assertEquals($file, encode($arr));
    }

    /**
     * @expectedException Exception
     */
    public function testException()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.json');
        decode($file);
    }
}
