<?php

namespace Converter;

require_once(__DIR__ . '/../vendor/autoload.php');

use function Json\jsonToArr;
use function Json\arrToJson;
use function Yaml\yamlToArr;
use function Yaml\arrToYaml;
use function Ini\iniToArr;
use function Ini\arrToIni;

function start($file, $formatOutput)
{
    $content = file_get_contents($file);

    $fileNameStruct = explode('.', $file);
    $formatInput = $fileNameStruct[sizeof($fileNameStruct) - 1];
    $formatOutput = strtolower($formatOutput);
    $fileName = $fileNameStruct[0];

    var_dump($formatInput);
    var_dump($formatOutput);

    switch ($formatInput) {
        case 'json':
            $arr = jsonToArr($content);
            break;
        case 'yml':
            $arr = yamlToArr($content);
            break;
        case 'ini':
            $arr = yamlToArr($content);
            break;
        default:
            echo('Unknown input format');
            return 1;
    }

    switch ($formatOutput) {
        case 'json':
            $result = arrToJson($arr);
            break;
        case 'yml':
            $result = arrToYaml($arr);
            break;
        case 'ini':
            $result = arrToIni($arr);
            break;
        default:
            echo('Unknown output format');
            return 1;
    }

    file_put_contents(__DIR__ . "/../OUT_$fileName.$formatOutput", $result);
}

start($argv[1], $argv[2]);
