<?php

namespace File;

function getFileContent($file)
{
    if (file_exists($file) && is_readable($file)) {
        return file_get_contents($file);
    }
}

function fileWrite($string, $fileName)
{
    file_put_contents($fileName, $string);
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
    return fileEncode(fileDecode($fileData, $formatInput), $formatOutput);
}

function fileEncode($fileDecoded, $formatOutput)
{
    switch ($formatOutput) {
        case 'json':
            return \Json\jsonEncode($fileDecoded);
            break;
        case 'yml':
            return \Yaml\yamlEncode($fileDecoded);
            break;
        case 'ini':
            return \Ini\iniEncode($fileDecoded);
            break;
        default:
            echo('Unknown output format');
            return 1;
    }
}
