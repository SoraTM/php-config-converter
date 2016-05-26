<?php

namespace Converter;

use function Json\jsonToArr;
use function Json\arrToJson;
use function Yaml\yamlToArr;
use function Yaml\arrToYaml;
use function Ini\iniToArr;
use function Ini\arrToIni;

function startConvert($file, $formatOutput)
{
    $content = file_get_contents($file);
    $formatOutput = strtolower($formatOutput);

    $pattern = '/\/{0,1}(?P<fileName>[a-z0-9\s]+).(?P<formatInput>\w+)$/i';
    $matches = [];
    preg_match($pattern, $file, $matches);

    $formatInput = $matches['formatInput'];
    $fileName = $matches['fileName'];

    switch ($formatInput) {
        case 'json':
            $arr = jsonDecode($content);
            break;
        case 'yml':
            $arr = yamlDecode($content);
            break;
        case 'ini':
            $arr = iniDecode($content);
            break;
        default:
            echo('Unknown input format');
            return 1;
    }

    switch ($formatOutput) {
        case 'json':
            $result = jsonEncode($arr);
            break;
        case 'yml':
            $result = yamlEncode($arr);
            break;
        case 'ini':
            $result = iniEncode($arr);
            break;
        default:
            echo('Unknown output format');
            return 1;
    }

    file_put_contents(__DIR__ . "/../OUT_$fileName.$formatOutput", $result);
}
