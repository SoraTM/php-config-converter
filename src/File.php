<?php

namespace File;

function getFileContent($file)
{
    return file_get_contents($file);
}

function fileWrite($string, $fileName, $formatOutput)
{
    file_put_contents(__DIR__ . "/../OUT_$fileName.$formatOutput", $string);
}

function getFileName($file)
{
    return getFileNameAndExt($file)['fileName'];
}

function getFileFormat($file)
{
    return getFileNameAndExt($file)['fileExt'];
}

function fileConvert($fileData, $formatInput, $formatOutput)
{
    switch ($formatInput) {
        case 'json':
            $fileDecoded = \Json\jsonDecode($fileData);
            break;
        case 'yml':
            $fileDecoded = \Yaml\yamlDecode($fileData);
            break;
        case 'ini':
            $fileDecoded = \Ini\iniDecode($fileData);
            break;
        default:
            echo('Unknown input format');
            return 1;
    }

    switch ($formatOutput) {
        case 'json':
            $string = \Json\jsonEncode($fileDecoded);
            return $string;
            break;
        case 'yml':
            $string = \Yaml\yamlEncode($fileDecoded);
            return $string;
            break;
        case 'ini':
            $string = \Ini\iniEncode($fileDecoded);
            return $string;
            break;
        default:
            echo('Unknown output format');
            return 1;
    }
}

function getFileNameAndExt($file)
{
    $pattern = '/\/{0,1}(?P<fileName>[a-z0-9\s]+).(?P<fileExt>\w+)$/i';
    $matches = [];
    preg_match($pattern, $file, $matches);

    return $matches;
}
