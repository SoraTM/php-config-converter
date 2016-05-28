<?php

namespace File;

function getFileContent($file)
{
    if(file_exists($file) && is_readable($file))
    {
        return file_get_contents($file);
    }
}

function fileWrite($string, $fileName)
{
    file_put_contents(__DIR__ . "/../$fileName", $string);
}

function getFileName($file)
{
    return pathinfo($file, PATHINFO_FILENAME);
}

function getFileFormat($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
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
