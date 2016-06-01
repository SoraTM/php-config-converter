<?php

namespace Ini\Tests;

use function Ini\decode;
use function Ini\encode;

class IniTest extends \PHPUnit_Framework_TestCase
{
    public function testIni()
    {
        $file = file_get_contents(__DIR__ . '/inputFiles/example.ini');

        $arr = [
            "require" =>
            [
                "php" => ">=5.6",
                "symfony/yaml" => "v3.1.0-BETA1",
                "piwik/ini" => "1.0.6"
            ],

            "require-dev" =>
            [
                "phpunit/phpunit" => "*",
                "squizlabs/php_codesniffer" => "2.*",
                "satooshi/php-coveralls" => "1.0.1",
                "codeclimate/php-test-reporter" => "dev-master"
            ]
        ];

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
