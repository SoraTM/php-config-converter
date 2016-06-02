<?php

namespace File;

function getFileContent($file)
{
    if (file_exists($file) && is_readable($file)) {
        return file_get_contents($file);
    } else {
        throw new \Exception("Unable to read file or not exist");
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

function fileDecode($fileData, $formatInput)
{
    return call_user_func(fileInitCodecs()[$formatInput]['decode'], $fileData);
}

function fileEncode($fileDecoded, $formatOutput)
{
    return call_user_func(fileInitCodecs()[$formatOutput]['encode'], $fileDecoded);
}

function fileInitCodecs()
{
    return [
        \Converter\Codecs\Json\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Json\encode',
            'decode' => '\Converter\Codecs\Json\decode'
        ],
        \Converter\Codecs\Yaml\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Yaml\encode',
            'decode' => '\Converter\Codecs\Yaml\decode'
        ],
        \Converter\Codecs\Ini\getSupportedFormat() => [
            'encode' => '\Converter\Codecs\Yaml\encode',
            'decode' => '\Converter\Codecs\Ini\decode'
        ]
    ];
}
