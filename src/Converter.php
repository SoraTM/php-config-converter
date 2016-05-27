<?php

namespace Converter;

use function Json\jsonDecode;
use function Json\jsonEncode;
use function Yaml\yamlDecode;
use function Yaml\yamlEncode;
use function Ini\iniDecode;
use function Ini\iniEncode;

function startConvert($file, $formatOutput)
{
    $content = file_get_contents($file);
    $formatOutput = strtolower($formatOutput);

    $fileExt = getFileExt($file);
    $fileName = getFileName($file);

    switch ($fileExt) {
        case 'json':
            $fileDecoded = jsonDecode($content);
            break;
        case 'yml':
            $fileDecoded = yamlDecode($content);
            break;
        case 'ini':
            $fileDecoded = iniDecode($content);
            break;
        default:
            echo('Unknown input format');
            return 1;
    }

    switch ($formatOutput) {
        case 'json':
            $string = jsonEncode($fileDecoded);
            break;
        case 'yml':
            $string = yamlEncode($fileDecoded);
            break;
        case 'ini':
            $string = iniEncode($fileDecoded);
            break;
        default:
            echo('Unknown output format');
            return 1;
    }

    fileWrite($string, $fileName, $formatOutput);
}

function fileWrite($string, $fileName, $formatOutput)
{
    file_put_contents(__DIR__ . "/../OUT_$fileName.$formatOutput", $string);
}

function getFileName($file)
{
    return getFileNameAndExt($file)['fileName'];
}

function getFileExt($file)
{
    return getFileNameAndExt($file)['fileExt'];
}

function getFileNameAndExt($file)
{
    $pattern = '/\/{0,1}(?P<fileName>[a-z0-9\s]+).(?P<fileExt>\w+)$/i';
    $matches = [];
    preg_match($pattern, $file, $matches);

    return $matches;
}
